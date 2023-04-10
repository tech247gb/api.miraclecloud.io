<?php


namespace App\Http\Controllers;


use App\Application\Alert\AlertCreate\AlertCreate;
use App\Application\Alert\AlertDelete\AlertDelete;
use App\Application\Alert\AlertExportExcel\AlertExportExcel;
use App\Application\Alert\AlertList\AlertList;
use App\Application\Alert\AlertServiceList\AlertServiceList;
use App\Application\Alert\AlertSuspend\AlertSuspend;
use App\Application\Alert\AlertTypeDescriptionList\AlertTypeDescriptionList;
use App\Application\Alert\AlertUnSuspend\AlertUnSuspend;
use App\Contract\CommandBus\CommandBusInterface;
use App\Http\Requests\Alert\AlertCreateRequest;
use App\Http\Requests\Alert\AlertExportExcelRequest;
use App\Http\Requests\Alert\AlertListRequest;
use App\Http\Requests\Alert\AlertServiceListRequest;
use App\Http\Requests\Alert\AlertSuspendRequest;
use App\Http\Requests\Alert\AlertUnSuspendRequest;
use App\Infrastructure\Response\Alert\AlertListResponse;
use App\Infrastructure\Response\Alert\AlertServiceListResponse;
use App\Infrastructure\Response\Alert\AlertTypeDescriptionListResponse;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Laravel\Lumen\Http\ResponseFactory;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Class AlertController
 * @package App\Http\Controllers
 *
 * @group Alerts
 */
class AlertController extends Controller
{

    /**
     * AlertController constructor.
     * @param CommandBusInterface $commandBus
     */
    public function __construct(CommandBusInterface $commandBus)
    {
        parent::__construct($commandBus);
    }

    /**
     * Alert's List
     *
     * @queryParam clientId required Param integer to related client id. Example: 2
     *
     * @responseFile 200 responses/alertList.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param AlertListRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function all(AlertListRequest $request)
    {

        try {

            $command = AlertList::getCommand();
            $command->setClientId($request->get('clientId'));

            return new JsonResponse(new AlertListResponse($this->process($command)), Response::HTTP_OK);

        } catch (Exception $exception) {

            throw $exception;
        }

    }

    /**
     * Alert Suspend
     *
     * @bodyParam alertId integer required Param for related alert. Example: 1
     *
     * @responseFile 204 responses/noContent.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param AlertSuspendRequest $request
     * @return Response|ResponseFactory
     * @throws Exception
     */
    public function suspend(AlertSuspendRequest $request)
    {

        try {

            $command = AlertSuspend::getCommand();
            $command->setAlertId($request->get('alertId'));

            $this->process($command);

            return response('', Response::HTTP_NO_CONTENT);

        } catch (Exception $exception) {

            throw $exception;
        }

    }

    /**
     * Alert Unsuspend
     *
     * @bodyParam alertId integer required Param for related alert. Example: 1
     *
     * @responseFile 204 responses/noContent.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     *
     * @param AlertUnSuspendRequest $request
     * @return Response|ResponseFactory
     * @throws Exception
     */
    public function unSuspend(AlertUnSuspendRequest $request)
    {

        try {

            $command = AlertUnSuspend::getCommand();
            $command->setAlertId($request->get('alertId'));

            $this->process($command);

            return response('', Response::HTTP_NO_CONTENT);

        } catch (Exception $exception) {

            throw $exception;
        }
    }

    /**
     * Alert Create
     *
     * @bodyParam clientId integer required Param for related client. Example: 1
     * @bodyParam alertName string required Param for related new alert name. Example: "Test alert"
     * @bodyParam alertTypeId integer required Param for related alert type. Example: 2
     * @bodyParam alertSourceId integer required Param for related alert source. Example: 2
     * @bodyParam productId integer optional Param for related alert product. Example: 4
     * @bodyParam entityTypeId integer optional Param for related alert entity type. Example: 4
     * @bodyParam entityId integer optional Param for related alert entity. Example: 4
     * @bodyParam tagKey string optional Param for tag key. Example: "test tag key"
     * @bodyParam tagValue string optional Param for tag key. Example: "test tag value"
     * @bodyParam comparisonTypeId integer optional Param for related alert comparison. Example: 3
     * @bodyParam percentageOfComparison integer optional Param for alert percentage of comparison. Example: 100
     * @bodyParam withinMonth integer optional Param for alert within Month. Example: 1-12
     * @bodyParam withinDay integer optional Param for alert withinDay. Example: 1-31
     * @bodyParam condition string optional Param for alert condition. Example: "{X} is greater than or equal to {Y}% of Monthly budget amount"
     * @bodyParam ownerId integer required Param for related alert owner. Example: 23
     * @bodyParam emailCC array optional Param for alert emailCC. Example: ["test@mail.com"]
     *
     * @responseFile 204 responses/noContent.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param AlertCreateRequest $request
     * @return Response|ResponseFactory
     * @throws Exception
     */
    public function create(AlertCreateRequest $request)
    {

        try {

            $command = AlertCreate::getCommand();
            $command->setClientId($request->get('clientId'));
            $command->setAlertName($request->get('alertName'));
            $command->setAlertTypeId($request->get('alertTypeId'));
            $command->setAlertSourceId($request->get('alertSourceId'));
            $command->setProductId($request->get('productId'));
            $command->setEntityTypeId($request->get('entityTypeId'));
            $command->setEntityId($request->get('entityId'));
            $command->setTagKey($request->get('tagKey'));
            $command->setTagValue($request->get('tagValue'));
            $command->setComparisonTypeId($request->get('comparisonTypeId'));
            $command->setPercentageOfComparison($request->get('percentageOfComparison'));
            $command->setWithinMonth($request->get('percentageOfComparison'));
            $command->setWithinDay($request->get('percentageOfComparison'));
            $command->setCondition($request->get('condition'));
            $command->setOwnerId($request->get('ownerId'));
            $command->setEmailCC($request->get('emailCC') ?? []);

            $this->process($command);

            return response('', Response::HTTP_NO_CONTENT);

        } catch (Exception $exception) {

            throw $exception;
        }

    }

    /**
     * Alert Delete
     *
     * Param id in path required
     *
     * @responseFile 204 responses/noContent.json
     * @responseFile 401 responses/unauthorized.json
     *
     * @param int $id
     * @return Response|ResponseFactory
     * @throws Exception
     */
    public function delete(int $id)
    {
        try {

            $command = AlertDelete::getCommand();
            $command->setId($id);

            $this->process($command);

            return response('', Response::HTTP_NO_CONTENT);

        } catch (Exception $exception) {

            throw $exception;
        }
    }

    /**
     * Alert Types Descriptions List
     *
     * @responseFile 200 responses/alertTypesDescriptionsList.json
     * @responseFile 401 responses/unauthorized.json
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function showTypesDescriptions()
    {
        try {

            $command = AlertTypeDescriptionList::getCommand();

            return new JsonResponse(new AlertTypeDescriptionListResponse($this->process($command)), Response::HTTP_OK);

        } catch (Exception $exception) {

            throw $exception;
        }
    }

    /**
     * Alert Service List
     *
     * @bodyParam productId integer required Param for filter by. Example: 1
     *
     * @responseFile 204 responses/alertServiceList.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param AlertServiceListRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function showServiceList(AlertServiceListRequest $request)
    {
        try {

            $command = AlertServiceList::getCommand();
            $command->setProductId($request->get('productId'));

            return new JsonResponse(new AlertServiceListResponse($this->process($command)), Response::HTTP_OK);

        } catch (Exception $exception) {

            throw $exception;
        }
    }

    /**
     * Alert Export Excel
     *
     * @bodyParam clientId integer required Param for related client. Example: 1
     * @bodyParam alertIds array required Array alert ids integers. Example: [1,2]
     *
     * @responseFile 200 responses/noContent.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param AlertExportExcelRequest $request
     * @return StreamedResponse
     * @throws Exception
     */
    public function export(AlertExportExcelRequest $request)
    {
        try {

            return response()->stream(function () use ($request) {

                $command = AlertExportExcel::getCommand();
                $command->setClientId($request->get('clientId'));
                $command->setAlertIds($request->get('alertIds'));

                $this->process($command);


            }, Response::HTTP_OK, [
                'Content-Type'        => 'text/csv',
                'Content-Disposition' => 'attachment; filename=alerts.csv',
            ]);
        } catch (Exception $exception) {

            throw $exception;
        }

    }
}
