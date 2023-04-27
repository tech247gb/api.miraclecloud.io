<?php


namespace App\Http\Controllers;


use App\Application\Notification\NotificationCreate\NotificationCreate;
use App\Application\Notification\NotificationDelete\NotificationDelete;
use App\Application\Notification\NotificationList\NotificationList;
use App\Application\Notification\NotificationSuspend\NotificationSuspend;
use App\Application\Notification\NotificationUnSuspend\NotificationUnSuspend;
use App\Contract\CommandBus\CommandBusInterface;
use App\Http\Requests\Notification\NotificationCreateRequest;
use App\Http\Requests\Notification\NotificationListRequest;
use App\Domain\Dashboard\DbModel;
// use App\Http\Requests\Notification\NotificationSuspendRequest;
// use App\Http\Requests\Notification\NotificationUnSuspendRequest;
use App\Infrastructure\Response\Notification\NotificationListResponse;

use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Laravel\Lumen\Http\ResponseFactory;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Class NotificationController
 * @package App\Http\Controllers
 *
 * @group Notifications
 */
class NotificationController extends Controller
{

    /**
     * NotificationController constructor.
     * @param CommandBusInterface $commandBus
     * 
     */
    private $model;

    /**
     * NotificationRepository constructor.
     * @param DbModel $model
     */
    public function __construct(CommandBusInterface $commandBus,DbModel $model)
    {
        parent::__construct($commandBus);
        $this->model = $model;
    }

    /**
     * Notification's List
     *
     * @queryParam UserID required Param integer to related client id. Example: 2
     *
     * @responseFile 200 responses/NotificationList.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param NotificationListRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function all(NotificationListRequest $request)
    {

        try {
            $Param1=$request->get('Seen');
            $param2=$request->get('UserID');
            if($Param1==0){
              $notifications=DB::select('call SP_NTF_GetNotifications(?, ?)',array(0,$param2));
            }else if($Param1==1){
              $notifications=DB::select('call SP_NTF_GetNotifications(?, ?)',array(1,$param2));
            }else{
                $notifications1=DB::select('call SP_NTF_GetNotifications(?, ?)',array(0,$param2));
                $notifications2=DB::select('call SP_NTF_GetNotifications(?, ?)',array(1,$param2));
                $notifications = array_merge ($notifications1, $notifications2);
            }
            
            return new JsonResponse($notifications, Response::HTTP_OK);

        } catch (Exception $exception) {

            throw $exception;
        }

    }
    public function ntfList(int $UserID)
    {
        $accountCommand = NotificationList::getCommand([
            'UserID' => $UserID,
        ]);
        $azureAccount = $this->process($accountCommand);
        return new JsonResponse(new NotificationListResponse($azureAccount), Response::HTTP_OK);
    }

    /**
     * Notification Suspend
     *
     * @bodyParam NotificationId integer required Param for related Notification. Example: 1
     *
     * @responseFile 204 responses/noContent.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param NotificationSuspendRequest $request
     * @return Response|ResponseFactory
     * @throws Exception
     */
    // public function suspend(NotificationSuspendRequest $request)
    // {

    //     try {

    //         $command = NotificationSuspend::getCommand();
    //         $command->setNotificationId($request->get('NotificationId'));

    //         $this->process($command);

    //         return response('', Response::HTTP_NO_CONTENT);

    //     } catch (Exception $exception) {

    //         throw $exception;
    //     }

    // }

    /**
     * Notification Unsuspend
     *
     * @bodyParam NotificationId integer required Param for related Notification. Example: 1
     *
     * @responseFile 204 responses/noContent.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     *
     * @param NotificationUnSuspendRequest $request
     * @return Response|ResponseFactory
     * @throws Exception
     */
    // public function unSuspend(NotificationUnSuspendRequest $request)
    // {

    //     try {

    //         $command = NotificationUnSuspend::getCommand();
    //         $command->setNotificationId($request->get('NotificationId'));

    //         $this->process($command);

    //         return response('', Response::HTTP_NO_CONTENT);

    //     } catch (Exception $exception) {

    //         throw $exception;
    //     }
    // }

    /**
     * Notification Create
     *
     * @bodyParam UserID integer required Param for related client. Example: 1
     * @bodyParam NotificationTitle string required Param for related new Notification name. Example: "Test Notification"
     * @bodyParam NotificationType integer required Param for related Notification type. Example: 2
     * @bodyParam AddedBy integer required Param for related Notification source. Example: 2
     * @bodyParam productId integer optional Param for related Notification product. Example: 4
     * @bodyParam redirecturl integer optional Param for related Notification entity type. Example: 4
     * @bodyParam Seen integer optional Param for related Notification entity. Example: 4
     * @bodyParam tagKey string optional Param for tag key. Example: "test tag key"
     * @bodyParam tagValue string optional Param for tag key. Example: "test tag value"
     * @bodyParam comparisonTypeId integer optional Param for related Notification comparison. Example: 3
     * @bodyParam percentageOfComparison integer optional Param for Notification percentage of comparison. Example: 100
     * @bodyParam withinMonth integer optional Param for Notification within Month. Example: 1-12
     * @bodyParam withinDay integer optional Param for Notification withinDay. Example: 1-31
     * @bodyParam condition string optional Param for Notification condition. Example: "{X} is greater than or equal to {Y}% of Monthly budget amount"
     * @bodyParam ownerId integer required Param for related Notification owner. Example: 23
     * @bodyParam emailCC array optional Param for Notification emailCC. Example: ["test@mail.com"]
     *
     * @responseFile 204 responses/noContent.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param NotificationCreateRequest $request
     * @return Response|ResponseFactory
     * @throws Exception
     */
    public function create(NotificationCreateRequest $request)
    {

        try {

            $command = NotificationCreate::getCommand();
            $command->setUserID($request->get('UserID'));
            $command->setNotificationTitle($request->get('NotificationTitle'));
            $command->setNotificationType($request->get('NotificationType'));
            $command->setAddedBy($request->get('AddedBy'));
            $command->setProductId($request->get('productId'));
            $command->setredirecturl($request->get('redirecturl'));
            $command->setSeen($request->get('Seen'));
           

            $this->process($command);

            return response('', Response::HTTP_NO_CONTENT);

        } catch (Exception $exception) {

            throw $exception;
        }

    }

    /**
     * Notification Delete
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
            $data = $this->model->deleteNotification([$id]);
            if (isset($data[0])) {
                $returnvalue='0';
                $keySuccess = '1';
                $keyError = '0';

                if (isset($data[0]->$keySuccess) && $data[0]->$keySuccess === 1) {

                    $returnvalue='1';
                }

                if (isset($data[0]->$keyError) && $data[0]->$keyError === 0) {

                    $returnvalue='0';
                }

            }
            return response($returnvalue, Response::HTTP_NO_CONTENT);


        } catch (Exception $exception) {

            throw $exception;
        }
    }

    public function update(NotificationListRequest $request)
    {
        try {
            $data = $this->model->updateNotification([$request->get('NtfID')]);
            if (isset($data[0])) {
                $returnvalue='0';
                $keySuccess = '1';
                $keyError = '0';
                if (isset($data[0]->$keySuccess) && $data[0]->$keySuccess === 1) {
                    $returnvalue='1';
                }

                if (isset($data[0]->$keyError) && $data[0]->$keyError === 0) {
                    $returnvalue='0';
                }

            }
            return response($returnvalue, Response::HTTP_NO_CONTENT);


        } catch (Exception $exception) {

            throw $exception;
        }
    }
    /**
     * Notification Types Descriptions List
     *
     * @responseFile 200 responses/NotificationTypesDescriptionsList.json
     * @responseFile 401 responses/unauthorized.json
     *
     * @return JsonResponse
     * @throws Exception
     */
  

    /**
     * Notification Service List
     *
     * @bodyParam productId integer required Param for filter by. Example: 1
     *
     * @responseFile 204 responses/NotificationServiceList.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param NotificationServiceListRequest $request
     * @return JsonResponse
     * @throws Exception
     */
   
    /**
     * Notification Export Excel
     *
     * @bodyParam UserID integer required Param for related client. Example: 1
     * @bodyParam NotificationIds array required Array Notification ids integers. Example: [1,2]
     *
     * @responseFile 200 responses/noContent.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param NotificationExportExcelRequest $request
     * @return StreamedResponse
     * @throws Exception
     */
   
}
