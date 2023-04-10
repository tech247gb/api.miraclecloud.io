<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Application\AlertHandle\AlertHandleList\AlertHandleList;
use App\Domain\AlertHandle\AlertHandle;
use App\Http\Requests\AlertHandle\AlertHandleListRequest;
use App\Infrastructure\Core\Pagination;
use App\Infrastructure\Response\AlertHandle\AlertHandleListResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class AlertHandleController
 * @package App\Http\Controllers
 *
 * @group AlertHandle
 */
class AlertHandleController extends Controller
{

    /**
     * List
     *
     * @authenticated
     *
     * @queryParam page Param for pagination. Example: 1
     * @queryParam perPage Param for pagination. Example: 10
     * @queryParam clientId required Param integer to related client id. Example: 2
     * @queryParam statusId integer status id, available statuses 6-open, 7-closed, 8-rejected, 9-handled. Example: 6
     *
     * @responseFile 200 responses/alertHandledList.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 400 responses/validationError.json
     *
     * @param AlertHandleListRequest $request
     *
     * @return JsonResponse
     *
     * @throws Exception
     */
    public function readList(AlertHandleListRequest $request): JsonResponse
    {
        try {

            $command = AlertHandleList::getCommand();

            $command->setStatusId((int) $request->get('statusId', AlertHandle::STATUS_OPEN));
            $command->setClientId((int) $request->get('clientId'));
            $command->setPagination(
                new Pagination(
                    (int) $request->get('page', Pagination::DEFAULT_PAGE),
                    (int) $request->get('perPage', Pagination::DEFAULT_PER_PAGE),
                    $request->url()
                )
            );

            return new JsonResponse(new AlertHandleListResponse($this->process($command)), Response::HTTP_OK);

        } catch (Exception $exception) {

            throw $exception;
        }
    }
}
