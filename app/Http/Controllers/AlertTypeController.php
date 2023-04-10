<?php


namespace App\Http\Controllers;


use App\Application\AlertType\AlertTypeList\AlertTypeList;
use App\Contract\CommandBus\CommandBusInterface;
use App\Infrastructure\Response\AlertType\AlertTypeListResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class AlertTypeController
 * @package App\Http\Controllers
 *
 * @group Alert Types
 */
class AlertTypeController extends Controller
{

    /**
     * AlertTypeController constructor.
     * @param CommandBusInterface $commandBus
     */
    public function __construct(CommandBusInterface $commandBus)
    {
        parent::__construct($commandBus);
    }

    /**
     * Alert Types List
     *
     * @responseFile 200 responses/alertTypesList.json
     * @responseFile 401 responses/unauthorized.json
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function all()
    {

        try {

            $command = AlertTypeList::getCommand();

            return new JsonResponse(new AlertTypeListResponse($this->process($command)), Response::HTTP_OK);

        } catch (Exception $exception) {

            throw $exception;
        }

    }

}
