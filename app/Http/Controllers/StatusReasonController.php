<?php

declare(strict_types = 1);

namespace App\Http\Controllers;


use App\Application\StatusReason\StatusReasonList\StatusReasonList;
use App\Http\Requests\StatusReason\StatusReasonListRequest;
use App\Infrastructure\Response\StatusReason\StatusReasonListResponse;
use Exception;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class StatusReasonController
 * @package App\Http\Controllers
 *
 * @group StatusReason
 */
class StatusReasonController extends Controller
{

    /**
     * List
     *
     * @authenticated
     *
     * @queryParam statusId required integer available statuses 6-open, 7-closed, 8-rejected, 9-handled. Example: 6
     *
     * @responseFile 200 responses/statusReasonList.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 400 responses/validationError.json
     *
     * @param StatusReasonListRequest $request
     *
     * @return JsonResponse
     *
     * @throws Exception
     */
    public function readList(StatusReasonListRequest $request): JsonResponse
    {
        try {

            $command = StatusReasonList::getCommand();

            $command->setStatusId((int) $request->get('statusId'));

            return new JsonResponse(new StatusReasonListResponse($this->process($command)), Response::HTTP_OK);

        } catch (Exception $exception) {

            throw $exception;
        }
    }

}
