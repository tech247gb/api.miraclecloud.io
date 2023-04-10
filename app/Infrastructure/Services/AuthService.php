<?php

namespace App\Infrastructure\Services;

use App\Application\User\GetUserByFilter\GetUserByFilter;
use App\Contract\CommandBus\CommandBusInterface;
use App\Contract\Core\JwtServiceInterface;
use App\Contract\Repository\SsoRepositoryInterface;
use App\Domain\User\User;
use App\Contract\Core\AuthServiceInterface;
use App\Domain\User\UserRepositoryInterface;
use App\Exceptions\UnauthorizedException;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class AuthService implements AuthServiceInterface
{
    /**
     * {@inheritdoc}
     */
    private $pattern = '/^Bearer\s+(.*?)$/';
    /**
     * @var SsoRepositoryInterface
     */
    private $ssoRepository;
    /**
     * @var JwtServiceInterface
     */
    private $jwtService;
    private $commandBus;

    /**
     * AuthService constructor.
     * @param JwtServiceInterface $jwtService
     * @param CommandBusInterface $commandBus
     * @param SsoRepositoryInterface $ssoRepository
     */
    public function __construct(JwtServiceInterface $jwtService, CommandBusInterface $commandBus, SsoRepositoryInterface $ssoRepository)
    {
        $this->jwtService = $jwtService;
        $this->commandBus = $commandBus;
        $this->ssoRepository = $ssoRepository;
    }

    /**
     * @param User $user
     * @param LoginRequest $request
     * @return array|null
     * @throws UnauthorizedException
     */
    public function login(User $user, LoginRequest $request): ?array
    {
        if ($user->status != User::STATUS_ACTIVE) {

            throw new UnauthorizedException(4018, "User not active", 401);
        }

        return $this->jwtService->generateTokenToUser($user, $request);
    }

    /**
     * @param User $user
     * @return array
     * @throws UnauthorizedException
     */
    public function getTokenBySso(User $user): array
    {
        if ($user->status != User::STATUS_ACTIVE) {

            throw new UnauthorizedException(4018, "User not active", 401);
        }

        return $this->jwtService->generateTokenToUserBySso($user);
    }

    /**
     * @param string $data
     * @return array
     * @throws UnauthorizedException
     */
    public function getTokenBySaml(string $data): array
    {
        $email = null;
        $certificate = null;

        $p = xml_parser_create();
        xml_parse_into_struct($p, base64_decode($data), $vals, $index);
        xml_parser_free($p);

        foreach ($vals as $val) {
            if ($val['tag'] && $val['tag'] == 'SAML2:NAMEID') {
                $email = $val['value'];
            }
            if ($val['tag'] && $val['tag'] == 'DS:X509CERTIFICATE') {
                $results = $this->getSsoByCertificate(str_replace(chr(10), '', $val['value']));

                if ($results->count() > 0) {
                    $certificate = $val['value'];
                }

            }
        }

        if (!$certificate || !$email) {
            throw new UnauthorizedException(4018, "User not active", 401);
        }
        /** @var UserRepositoryInterface $userRepository */
        $userRepository = app()->make(UserRepositoryInterface::class);
        $userRepositoryFilter = $userRepository->getUserRepositoryFilter();
        $userRepositoryFilter->setEmail($email);
        /** @var User $user */
        $user = $userRepository->samlLogin($userRepositoryFilter);

        if (!$user->id) {
            throw new UnauthorizedException(4018, "User not active", 401);
        }

        return $this->jwtService->generateTokenToUserBySso($user);
    }

    /**
     * @param string $certificate
     * @return Collection
     */
    protected function getSsoByCertificate(string $certificate): Collection
    {
        $filter = $this->ssoRepository->getSourceFilter();
        $filter->setCertificate($certificate);

        return $this->ssoRepository->ssoByCertificate($filter);
    }

    /**
     * @param string|null $client
     * @return Collection
     */
    public function getDestinationByClient(?string $client): Collection
    {
        $filter = $this->ssoRepository->getSourceFilter();
        if ($client) {
            $filter->setClient($client);
        }

        return $this->ssoRepository->destinationByClient($filter);
    }

    /**
     * @param string $data
     * @return array
     * @throws UnauthorizedException
     */
    public function getTokenByAzur(string $data): array
    {
        $email = null;
        $certificate = null;
        $simpleXml = simplexml_load_string(base64_decode($data));
        $results = collect();
        if (!empty($simpleXml->Assertion->Subject->NameID)) {
            $email = (string)$simpleXml->Assertion->Subject->NameID;
        }
        if (!empty($simpleXml->Assertion->Signature->KeyInfo->X509Data->X509Certificate)) {
            $results = $this->getSsoByCertificate($simpleXml->Assertion->Signature->KeyInfo->X509Data->X509Certificate);

            if (
                $results->count() > 0
            ) {
                $certificate = (string)$simpleXml->Assertion->Signature->KeyInfo->X509Data->X509Certificate[0];
            }
        }
        if (!$certificate || !$email) {
            throw new UnauthorizedException(4018, "User not active", 401);
        }
        /** @var UserRepositoryInterface $userRepository */
        $userRepository = app()->make(UserRepositoryInterface::class);
        $userRepositoryFilter = $userRepository->getUserRepositoryFilter();
        $userRepositoryFilter->setEmail($email);
        /** @var User $user */
        $user = $userRepository->samlLogin($userRepositoryFilter);

        if (!$user->id) {
            throw new UnauthorizedException(4018, "User not active", 401);
        }

        return $this->jwtService->generateTokenToUserBySso($user);
    }

    /**
     * @param Request $loginRequest
     * @return User|null
     * @throws UnauthorizedException
     */
    public function authByToken(Request $loginRequest): ?User
    {
        $decodeToken = $this->jwtService->authByToken(
            $this->getBearerTokenFromRequest($loginRequest)
        );

        if (!$decodeToken) {

            throw new UnauthorizedException(4017, "Token not provided", 401);
        }

        if (isset($decodeToken->sso)) {
            return $this->commandBus->dispatch(
                GetUserByFilter::getCommand()
                    ->setEmail($decodeToken->iss)
                    ->setName($decodeToken->ufn)
                    ->setSSO(true)
            );
        } else {
            return $this->commandBus->dispatch(
                GetUserByFilter::getCommand()
                    ->setEmail($decodeToken->iss)
                    ->setPassword($decodeToken->aud)
                    ->setIp($loginRequest->ip())
                    ->setOne(true)
            );
        }
    }

    /**
     * @param Request $loginRequest
     * @return string
     * @throws UnauthorizedException
     */
    protected function getBearerTokenFromRequest(Request $loginRequest): string
    {
        $token = $loginRequest->header('Authorization');
        if (preg_match($this->pattern, $token, $matches)) {

            return $matches[1];
        }

        throw new UnauthorizedException(4016, "Token not provided", 401);
    }

    /**
     * @param string $token
     * @param string $key
     * @return \stdClass|null
     * @throws UnauthorizedException
     */
    public function ssoAuthByToken(string $token, string $key): ?\stdClass
    {
        $decodeToken = $this->jwtService->ssoAuthByToken($token, $key);

        if (!$decodeToken) {

            throw new UnauthorizedException(4017, "Token not provided", 401);
        }

        return $decodeToken;

    }
}
