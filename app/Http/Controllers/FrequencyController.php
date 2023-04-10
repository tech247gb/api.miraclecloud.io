<?php


namespace App\Http\Controllers;


use App\Application\Frequency\FrequencyShowByAlertTypeId\FrequencyShowByAlertTypeId;
use App\Contract\CommandBus\CommandBusInterface;
use App\Http\Requests\Frequency\FrequencyShowByAlertTypeIdRequest;
use App\Infrastructure\Response\Frequency\FrequencyListResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class FrequencyController
 * @package App\Http\Controllers
 *
 * @group Frequency
 */
class FrequencyController extends Controller
{

    /**
     * FrequencyController constructor.
     * @param CommandBusInterface $commandBus
     */
    public function __construct(CommandBusInterface $commandBus)
    {
        parent::__construct($commandBus);
    }

    /**
     * Frequency list by alert type id
     *
     * @queryParam alertTypeId required Param integer to related alert type id. Example: 2
     *
     * @responseFile 200 responses/frequencyList.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param FrequencyShowByAlertTypeIdRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function listByAlertTypeId(FrequencyShowByAlertTypeIdRequest $request)
    {
        try {

            $command = FrequencyShowByAlertTypeId::getCommand();
            $command->setAlertTypeId($request->get('alertTypeId'));

            return new JsonResponse(new FrequencyListResponse($this->process($command)), Response::HTTP_OK);

        } catch (Exception $exception) {

            throw $exception;
        }
    }

}
