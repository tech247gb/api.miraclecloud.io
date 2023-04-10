<?php


namespace App\Http\Controllers;


use App\Application\Source\SourceList\SourceList;
use App\Contract\CommandBus\CommandBusInterface;
use App\Http\Requests\Source\SourceListRequest;
use App\Infrastructure\Response\Source\SourceListResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class SourceController
 * @package App\Http\Controllers
 *
 * @group Sources
 */
class SourceController extends Controller
{

    /**
     * SourceController constructor.
     * @param CommandBusInterface $commandBus
     */
    public function __construct(CommandBusInterface $commandBus)
    {
        parent::__construct($commandBus);
    }

    /**
     * Source List
     *
     * @queryParam alertTypeId required Param for filtering related sources. Example: 2
     *
     * @responseFile 200 responses/sourceList.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param SourceListRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function all(SourceListRequest $request)
    {

        try {

            $command = SourceList::getCommand();
            $command->setAlertTypeId($request->get('alertTypeId'));

            return new JsonResponse(new SourceListResponse($this->process($command)), Response::HTTP_OK);

        } catch (Exception $exception) {

            throw $exception;
        }

    }
}
