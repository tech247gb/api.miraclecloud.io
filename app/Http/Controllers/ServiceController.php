<?php


namespace App\Http\Controllers;


use App\Application\Service\ServiceList\ServiceList;
use App\Contract\CommandBus\CommandBusInterface;
use App\Http\Requests\Service\ServiceListRequest;
use App\Infrastructure\Response\Service\ServiceListResponse;
use Illuminate\Http\JsonResponse;

/**
 * Class ServiceController
 * @package App\Http\Controllers
 *
 * @group Services
 */
class ServiceController extends Controller
{

    /**
     * ServiceController constructor.
     * @param CommandBusInterface $commandBus
     */
    public function __construct(CommandBusInterface $commandBus)
    {
        parent::__construct($commandBus);
    }

    /**
     * Services List
     *
     * @queryParam clientId required Param integer to related client id. Example: 2
     *
     * @responseFile 200 responses/serviceList.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param ServiceListRequest $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function serviceList(ServiceListRequest $request)
    {
        try {

            return new JsonResponse(
                new ServiceListResponse(
                    $this->process(
                        ServiceList::getCommand()
                            ->setClientId($request->get('clientId'))
                    )
                )

            );

        } catch (\Exception $exception) {

            throw $exception;
        }
    }
}
