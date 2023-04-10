<?php

declare(strict_types = 1);

namespace App\Http\Controllers;


use App\Application\AlertStatus\{
    AlertStatusList\AlertStatusList,
    AlertStatusUpdate\AlertStatusUpdate
};
use App\Http\Requests\AlertStatus\AlertStatusUpdateRequest;
use App\Infrastructure\Response\AlertStatus\AlertStatusListResponse;
use Exception;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class AlertStatusController
 * @package App\Http\Controllers
 *
 * @group AlertStatus
 */
class AlertStatusController extends Controller
{

    /**
     * List
     *
     * @authenticated
     *
     * @responseFile 200 responses/alertStatusList.json
     * @responseFile 401 responses/unauthorized.json
     *
     * @return JsonResponse
     *
     * @throws Exception
     */
    public function readList(): JsonResponse
    {
        try {

            $command = AlertStatusList::getCommand();

            return new JsonResponse(new AlertStatusListResponse($this->process($command)), Response::HTTP_OK);

        } catch (Exception $exception) {

            throw $exception;
        }
    }

    /**
     * Update
     *
     * @authenticated
     *
     * @urlParam  alertId required integer Alert id. Example: 1
     *
     * @bodyParam  statusId required integer, available statuses 6-open, 7-closed, 8-rejected, 9-handled. Example: 6
     * @bodyParam  reasonId required integer, Reason id. Example: 1
     * @bodyParam  userId required integer, User id. Example: 1
     *
     * @responseFile 204 responses/noContent.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 400 responses/validationError.json
     *
     * @param int $alertId
     * @param AlertStatusUpdateRequest $request
     * @return Response
     * @throws Exception
     */
    public function update(int $alertId, AlertStatusUpdateRequest $request): Response
    {
        try {

            $command = AlertStatusUpdate::getCommand();
            $command->setAlertId($alertId);
            $command->setStatusId($request->get('statusId'));
            $command->setReasonId($request->get('reasonId'));
            $command->setUserId($request->get('userId'));

            $this->process($command);

            return new Response('', Response::HTTP_NO_CONTENT);

        } catch (Exception $exception) {

            throw $exception;
        }
    }
}
