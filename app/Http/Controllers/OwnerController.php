<?php


namespace App\Http\Controllers;


use App\Application\Owner\OwnerList\OwnerList;
use App\Contract\CommandBus\CommandBusInterface;
use App\Http\Requests\Owner\OwnerListRequest;
use App\Infrastructure\Response\Owner\OwnerListResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class OwnerController
 * @package App\Http\Controllers
 *
 * @group Owner
 */
class OwnerController extends Controller
{

    /**
     * OwnerController constructor.
     * @param CommandBusInterface $commandBus
     */
    public function __construct(CommandBusInterface $commandBus)
    {
        parent::__construct($commandBus);
    }

    /**
     *
     * Owner List
     *
     * @queryParam clientId required Param integer to related client id. Example: 2
     *
     * @responseFile 200 responses/ownerList.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param OwnerListRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function all(OwnerListRequest $request)
    {

        try {

            $command = OwnerList::getCommand();
            $command->setClientId($request->get('clientId'));

            return new JsonResponse(new OwnerListResponse($this->process($command)), Response::HTTP_OK);

        } catch (Exception $exception) {

            throw $exception;
        }

    }

}
