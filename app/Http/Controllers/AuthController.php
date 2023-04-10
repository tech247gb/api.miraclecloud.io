<?php

namespace App\Http\Controllers;

use App\Application\User\GetUserByFilter\GetUserByFilter;
use App\Contract\CommandBus\CommandBusInterface;
use App\Contract\Core\AuthServiceInterface;
use App\Contract\Repository\SsoRepositoryInterface;
use App\Domain\User\UserRepositoryInterface;
use App\Exceptions\UnauthorizedException;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SsoLoginRequest;
use App\Infrastructure\Response\User\LoginResource;
use App\Infrastructure\Response\User\SsoResource;
use DateTime;
use DOMDocument;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use SAML2\AuthnRequest;
use SAML2\Compat\ContainerSingleton;
use SAML2\Compat\Ssp\Container;
use SAML2\DOMDocumentFactory;
use SAML2\HTTPRedirect;
use SAML2\XML\saml\Issuer;
use SimpleSAML\Utils\Random;

/**
 * Class AuthController
 * @package App\Http\Controllers
 *
 * @group User auth
 * Authorization URLs.
 */
class AuthController extends Controller
{
    /**
     * @var AuthServiceInterface
     */
    private $authService;
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * AuthController constructor.
     * @param AuthServiceInterface $authService
     * @param CommandBusInterface $commandBus
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(AuthServiceInterface $authService, CommandBusInterface $commandBus, UserRepositoryInterface $userRepository)
    {
        $this->authService = $authService;
        $this->userRepository = $userRepository;
        parent::__construct($commandBus);
    }

    /**
     * Login
     *
     * @bodyParam email string required The email of the user. Example: email@email.com
     * @bodyParam password string required The password of the user. Example: password
     *
     * @responseFile 200 responses/authLogin.json
     * @responseFile 422 responses/validationError.json
     *
     * @param Request $request
     * @return JsonResponse|\Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     * @throws \Throwable
     */
    public function login(LoginRequest $request)
    {
        $command = GetUserByFilter::getCommand()
            ->setEmail($request->get('email'))
            ->setPassword($request->get('password'))
            ->setOne(true)
            ->setIp($request->ip());

        $user = $this->process($command);

        if (is_null($user)) {

            throw new UnauthorizedException(4014, "Token not provided", 401);
        }

        try {
            $token = $this->authService->login($user, $request);

        } catch (UnauthorizedException $exception) {

            throw $exception;
        } catch (\Exception $exception) {
            throw $exception;
        } catch (\Throwable $throwable) {
            throw $throwable;
        }

        if (is_null($token)) {

            throw new UnauthorizedException(4015, "Token not provided", 401);
        }

        return $this->getResponse(
            new LoginResource([
                'token' => $token,
                'user' => $user,
            ])
        );
    }

    /**
     * SSO Login
     *
     * Request Header param PrefferedUrl required
     * Example: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1Zm4iOiJVc2VyRnVsbE5hb
     *
     * @responseFile 200 responses/ssoLogin.json
     * @responseFile 401 responses/unauthorized.json
     *
     * @param SsoLoginRequest $request
     * @return JsonResponse
     * @throws UnauthorizedException
     * @throws \Throwable
     */
    public function ssoLogin(SsoLoginRequest $request)
    {
        if (!empty($reff = $request->header('PrefferedUrl'))) {

            if (empty($reffData = $this->userRepository->getPrivateKey($reff))) {

                throw new UnauthorizedException(4017, "Token not provided", 401);
            } else {
                $tokenDecode = $this->authService->ssoAuthByToken($reff, $reffData[0]->PrivateKey);
            }
        } else {
            throw new UnauthorizedException(4016, "Token not provided", 401);
        }
        $command = GetUserByFilter::getCommand()
            ->setEmail($tokenDecode->iss)
            ->setName($tokenDecode->ufn)
            ->setSSO(true);

        $user = $this->process($command);

        if (is_null($user)) {

            throw new UnauthorizedException(4014, "Token not provided", 401);
        }

        try {
            $token = $this->authService->getTokenBySso($user);

        } catch (UnauthorizedException $exception) {

            throw $exception;
        } catch (\Exception $exception) {
            throw $exception;
        } catch (\Throwable $throwable) {
            throw $throwable;
        }

        if (is_null($token)) {

            throw new UnauthorizedException(4015, "Token not provided", 401);
        }

        $redirectUrl = env('URL_KLI') . "?confirm_sso=" . $token["accessToken"];

        return $this->getResponse(
            new SsoResource([
                'url' => $redirectUrl,
            ])
        );

    }

    /**
     * SAML Login
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function samlLogin(Request $request)
    {
        $redirectUrl = env('FRONT_URL');
        try {
            $token = $this->authService->getTokenBySaml($request->get('SAMLResponse'));
            $token = $token['accessToken'];
        } catch (\Exception $exception) {

            return redirect($redirectUrl . '/saml-login?' . http_build_query(['result' => false]), 301);
        }

        return redirect($redirectUrl . '/saml-login?' . http_build_query(['result' => true, 'access' => $token]), 301);

    }

    /**
     * AZUR Post Login
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     * @throws \Exception
     */
    public function azurLogin(Request $request)
    {
        $redirectUrl = env('FRONT_URL');
        try {
            $token = $this->authService->getTokenByAzur($request->post('SAMLResponse'));
            $token = $token['accessToken'];
        } catch (\Exception $exception) {

            return redirect($redirectUrl . '/saml-login?' . http_build_query(['result' => false]), 301);
        }

        return redirect($redirectUrl . '/saml-login?' . http_build_query(['result' => true, 'access' => $token]), 301);

    }

    /**
     * AZUR Get Login
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector|string
     * @throws \Exception
     */
    public function azurGetLogin(Request $request)
    {
        try {
            $results = $this->authService->getDestinationByClient($request->get('client'));

            if ($results->count() > 0) {

                $d = new DateTime();
                // Create Issuer
                $document = new DOMDocument('1.0');
                $document->loadXML('<samlp:AuthnRequest
                                            xmlns="urn:oasis:names:tc:SAML:2.0:metadata"
                                            ID="' . 'id_' . bin2hex(openssl_random_pseudo_bytes((int)((43 - 1) / 2))) . '"
                                            Version="2.0" IssueInstant="' . $d->format('Y-m-d\TH:i:s.u') . 'Z' . '"
                                            xmlns:samlp="urn:oasis:names:tc:SAML:2.0:protocol">
                                            <Issuer xmlns="urn:oasis:names:tc:SAML:2.0:assertion">' . $results->first()->getAppIdentity() . '</Issuer>
                                            </samlp:AuthnRequest>');
                $msgStr = gzdeflate($document->saveXML());
                $msgStr = base64_encode($msgStr);
                /* Build the query string. */
                $msg = 'SAMLRequest=';
                $msg .= urlencode($msgStr);

                $redirectUrl = $results->first()->getAppDestination() . '?' . $msg;

                return redirect($redirectUrl, 301);
            }

        } catch (\Exception $exception) {

            return redirect(env('FRONT_URL') . '/saml-login?' . http_build_query(['result' => false, 'auth' => 'error']), 301);
        }

        return redirect(env('FRONT_URL') . '/saml-login?' . http_build_query(['result' => false, 'auth' => 'none']), 301);
    }

    /**
     * Check Token
     *
     * @responseFile 200 responses/checkToken.json
     * @responseFile 401 responses/unauthorized.json
     *
     * @param SsoLoginRequest $request
     * @return JsonResponse
     * @throws UnauthorizedException
     * @throws \Throwable
     */
    public function checkToken(SsoLoginRequest $request)
    {
        if (!$request->header('Authorization')) {

            throw new UnauthorizedException(4019, "Header not provided", 401);
        }

        try {
            $user = $this->authService->authByToken($request);
        } catch (UnauthorizedException $exception) {

            throw $exception;
        }
        if (is_null($user)) {

            throw new UnauthorizedException(4020, "Token not provided", 401);
        }

        try {
            $token = $this->authService->getTokenBySso($user);

        } catch (UnauthorizedException $exception) {

            throw $exception;
        } catch (\Exception $exception) {
            throw $exception;
        } catch (\Throwable $throwable) {
            throw $throwable;
        }

        if (is_null($token)) {

            throw new UnauthorizedException(4021, "Token not provided", 401);
        }

        return $this->getResponse(
            new LoginResource([
                'token' => $token,
                'user' => $user,
            ])
        );
    }
}
