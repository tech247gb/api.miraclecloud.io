<?php


namespace App\Http\Controllers;


use App\Application\PowerBI\GetReportEmbedToken\GetReportEmbedToken;
use App\Application\PowerBI\GetReportListByUser\GetReportListByUser;
use App\Contract\CommandBus\CommandBusInterface;
use App\Exceptions\UnprocessableExceptions;
use App\Infrastructure\Response\PowerBI\PowerBIEmbedTokenResponse;
use App\Infrastructure\Response\PowerBI\PowerBIReportListResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\GenericProvider;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class PowerBIController
 * @package App\Http\Controllers
 *
 * @group Power Bi
 */
class PowerBIController extends Controller
{

    /**
     * VendorController constructor.
     * @param CommandBusInterface $commandBus
     */
    public function __construct(CommandBusInterface $commandBus)
    {
        parent::__construct($commandBus);
    }

    /**
     * Get embed token
     *
     * @responseFile 200 responses/embedToken.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422
     *
     * @param Request $request
     * @return JsonResponse
     * @throws UnprocessableExceptions
     */
    public function getReportEmbedToken(Request $request)
    {
        try {

            $command = GetReportEmbedToken::getCommand();
            $command->setGroupId($request->route('group_id'));
            $command->setReportId($request->route('report_id'));

            return new JsonResponse(new PowerBIEmbedTokenResponse($this->process($command)), Response::HTTP_OK);

        } catch (IdentityProviderException $exception) {

            throw new UnprocessableExceptions(5000);
        } catch (\Exception $exception) {

            throw new UnprocessableExceptions(5001);
        }

    }

    /**
     * Reports list
     *
     * @responseFile 200 responses/powerBIReportList.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function reportList(Request $request)
    {
        $command = GetReportListByUser::getCommand();
        $command->setUser($request->user);

        return new JsonResponse(new PowerBIReportListResponse($this->process($command)), Response::HTTP_OK);
    }
}
