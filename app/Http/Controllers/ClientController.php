<?php

namespace App\Http\Controllers;

use App\Application\Client\AccountGet\AccountGet;
use App\Application\Client\AccountList\AccountList;
use App\Application\Client\AccountUpdate\AccountUpdate;
use App\Application\Client\CreateClient\CreateClient;
use App\Application\Client\DeleteClient\DeleteClient;
use App\Application\Client\GetClientById\GetClientById;
use App\Application\Client\ListClient\ListClient;
use App\Application\Client\UpdateClient\UpdateClient;
use App\Application\Client\AccountAdd\AccountAdd;
use App\Application\Resource\ResourceList\ResourceList;
use App\Contract\CommandBus\CommandBusInterface;
use App\Domain\User\User;
use App\Exceptions\Client\AccountListExceptions;
use App\Exceptions\Client\ClientDeleteExceptions;
use App\Exceptions\Client\ClientSaveExceptions;
use App\Exceptions\Client\ClientSearchExceptions;
use App\Exceptions\ForbiddenExceptions;
use App\Http\Requests\AccountGetRequest;
use App\Http\Requests\AccountListRequest;
use App\Http\Requests\AccountRequest;
use App\Http\Requests\AddAccountRequest;
use App\Http\Requests\LoadClientRequest;
use App\Http\Requests\Resource\ResourceListRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Infrastructure\Core\Rbac;
use App\Infrastructure\DatabaseRepository\AccountRepository;
use App\Infrastructure\Response\Client\AccountAddDataResponse;
use App\Infrastructure\Response\Client\AccountGetDataResponse;
use App\Infrastructure\Response\Client\AccountListDataResponse;
use App\Infrastructure\Response\Resource\ResourceListResponse;
use Illuminate\Http\Response;
use Laravel\Lumen\Http\ResponseFactory;
use App\Infrastructure\Response\Client\ClientDataResponse;
use App\Infrastructure\Response\Client\ClientListDataResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Mockery\Exception;

/**
 * Class ClientController
 * @package App\Http\Controllers
 *
 * @group Clients, Accounts
 */
class ClientController extends Controller
{
    /**
     * @var User $user
     */
    private $user;

    /**
     * ClientController constructor.
     * @param CommandBusInterface $commandBus
     * @param Request $request
     */
    public function __construct(CommandBusInterface $commandBus, Request $request)
    {
        parent::__construct($commandBus);

        $this->user = $request->user;
    }

    /**
     * Get Client
     *
     * @urlParam id required integer Example: 3
     *
     * @responseFile 200 responses/clientById.json
     * @responseFile 401 responses/unauthorized.json
     *
     * @param $id
     * @return JsonResponse
     * @throws ClientSearchExceptions
     * @throws ForbiddenExceptions
     */
    public function get($id)
    {
        try {
            Rbac::canClientGet($this->user);

            return new JsonResponse(new ClientDataResponse(
                $this->process(
                    GetClientById::getCommand()
                        ->setId($id)
                )
            ));
        } catch (ClientSearchExceptions $exception) {

            throw $exception;
        }

    }

    /**
     * Clients List
     *
     * @responseFile 200 responses/clientList.json
     * @responseFile 401 responses/unauthorized.json
     *
     * @return JsonResponse
     * @throws ForbiddenExceptions
     */
    public function list()
    {
        Rbac::canClientList($this->user);

        return new JsonResponse(new ClientListDataResponse(
            $this->process(
                ListClient::getCommand()
            )
        ));
    }

    /**
     * @param LoadClientRequest $request
     * @return JsonResponse
     * @throws ClientSaveExceptions
     * @throws ForbiddenExceptions
     */
    public function create(LoadClientRequest $request)
    {
        try {
            Rbac::canClientCreate($this->user);

            return new JsonResponse(new ClientDataResponse(
                $this->process(
                    CreateClient::getCommand()
                        ->setName($request->get('clientname'))
                )
            ));
        } catch (ClientSaveExceptions $exception) {

            throw $exception;
        }
    }

    /**
     * @param $id
     * @param LoadClientRequest $request
     * @return JsonResponse
     * @throws ClientSaveExceptions
     * @throws ClientSearchExceptions
     * @throws ForbiddenExceptions
     */
    public function update($id, LoadClientRequest $request)
    {
        try {
            Rbac::canClientUpdate($this->user);

            return new JsonResponse(new ClientDataResponse(
                $this->process(
                    UpdateClient::getCommand()
                        ->setId($id)
                        ->setName($request->get('clientname'))
                )
            ));
        } catch (ClientSearchExceptions $exception) {

            throw $exception;
        } catch (ClientSaveExceptions $exception) {

            throw $exception;
        }
    }

    /**.
     * @param $id
     * @return Response|ResponseFactory
     * @throws ClientDeleteExceptions
     * @throws ClientSearchExceptions
     * @throws ForbiddenExceptions
     */
    public function delete($id)
    {
        try {
            Rbac::canClientDelete($this->user);

            $this->process(
                DeleteClient::getCommand()
                    ->setId($id)
            );

            return response('', 204);
        } catch (ClientSearchExceptions $exception) {

            throw $exception;
        } catch (ClientDeleteExceptions $exception) {

            throw $exception;
        }
    }

    /**
     * Account Enable
     *
     * @bodyParam accountId integer required Param for filtering data. Example: 3
     *
     * @responseFile 204 responses/account.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param AccountRequest $request
     * @return Response|ResponseFactory
     * @throws AccountListExceptions
     * @throws ClientSearchExceptions
     * @throws ForbiddenExceptions
     */
    public function accountEnable(AccountRequest $request)
    {
        try {
            Rbac::canAccountControl($this->user);
            /** @var AccountRepository $repository */
            $repository =  new AccountRepository();
            $repository->accountEnable($request->get('accountId'));
            return response('', 204);
        } catch (ClientSearchExceptions $exception) {

            throw $exception;
        } catch (AccountListExceptions $exception) {

            throw $exception;
        }
    }

    /**
     * Account Disable
     *
     * @bodyParam accountId integer required Param for filtering data. Example: 3
     *
     * @responseFile 204 responses/account.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param AccountRequest $request
     * @return Response|ResponseFactory
     * @throws AccountListExceptions
     * @throws ClientSearchExceptions
     * @throws ForbiddenExceptions
     */
    public function accountDisable(AccountRequest $request)
    {
        try {
            Rbac::canAccountControl($this->user);

            /** @var AccountRepository $repository */
            $repository =  new AccountRepository();
            $repository->accountDisable($request->get('accountId'));
            return response('', 204);
        } catch (ClientSearchExceptions $exception) {

            throw $exception;
        } catch (AccountListExceptions $exception) {

            throw $exception;
        }
    }

    /**
     * Account Delete
     *
     * @bodyParam accountId integer required Param for related account id. Example: 3
     *
     * @responseFile 204 responses/accountDelete.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param AccountRequest $request
     * @return Response|ResponseFactory
     * @throws AccountListExceptions
     * @throws ClientSearchExceptions
     * @throws ForbiddenExceptions
     */
    public function accountDelete(AccountRequest $request)
    {
        try {
            Rbac::canAccountControl($this->user);

            /** @var AccountRepository $repository */
            $repository =  new AccountRepository();
            $repository->accountDelete($request->get('accountId'));
            return response('', 204);
        } catch (ClientSearchExceptions $exception) {

            throw $exception;
        } catch (AccountListExceptions $exception) {

            throw $exception;
        }
    }

    /**
     * Account List
     *
     * @bodyParam clientId integer required Param for filtering data. Example: 3
     *
     * @responseFile 200 responses/accountList.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param AccountListRequest $request
     * @return mixed
     * @throws AccountListExceptions
     * @throws ClientSearchExceptions
     * @throws ForbiddenExceptions
     */
    public function accountList(AccountListRequest $request)
    {
        try {
            Rbac::canAccountControl($this->user);

            return new JsonResponse(
                new AccountListDataResponse(
                    $this->process(
                        AccountList::getCommand()
                            ->setClientId($request->get('clientId'))
                    )));

        } catch (ClientSearchExceptions $exception) {

            throw $exception;
        } catch (AccountListExceptions $exception) {

            throw $exception;
        }
    }


    /**
     * Get Account
     *
     * @queryParam accountId required Param for related account id
     *
     * @responseFile 200 responses/accountGet.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param AccountGetRequest $request
     * @return mixed
     * @throws AccountListExceptions
     * @throws ClientSearchExceptions
     * @throws ForbiddenExceptions
     */
    public function getAccount(AccountGetRequest $request)
    {
        try {
            Rbac::canAccountControl($this->user);

            return new JsonResponse(
                new AccountGetDataResponse(
                    $this->process(
                        AccountGet::getCommand()
                            ->setAccountId($request->get('accountId'))
                    )));

        } catch (Exception $exception) {

            throw $exception;
        }
    }

    /**
     * Create Account
     *
     * @bodyParam vendorId integer required Param for Azure = 1 or AWS = 2 provider. Example: 1,2
     * @bodyParam accountNumber string required Param account number(Azure, AWS). Example: "wvwrgOgrwgkrwg"
     * @bodyParam accountName string required Param account name(Azure, AWS). Example: "Test account"
     * @bodyParam statusId integer required Param account status(Azure, AWS). Example: 1
     * @bodyParam businessUnitId integer required Param for account business unit(Azure, AWS). Example: 1
     * @bodyParam clientId integer required Param for account client(Azure, AWS). Example: 1
     * @bodyParam tenant string required Param for account only if vendorId = 1(Azure). Example: "Test tenant"
     * @bodyParam clientIdKey string required Param for account only if vendorId = 1(Azure). Example: "GrswhehErwystymzdtehzdth"
     * @bodyParam clientSecret string required Param for account only if vendorId = 1(Azure). Example: "P09214tgowlnvgaenjrg"
     * @bodyParam subscriptionId string required Param for account only if vendorId = 1(Azure). Example: "qweqweqTHbddfQefqegEgA"
     * @bodyParam subBusinessUnitId integer Param for account sub business unit(Azure, AWS). Example: "qweqweqTHbddfQefqegEgA"
     * @bodyParam aRN string required Param for account only if vendorId = 2(AWS). Example: "qweqweqTHbddfQefqegEgA"
     * @bodyParam bucketName string required Param for account only if vendorId = 2(AWS). Example: "qweqweqTHbddfQefqegEgA"
     * @bodyParam enrollmentId string Param for account(Azure, AWS). Example: "qweqweqTHbddfQefqegEgAqefqefqekutklug$wrwrt"
     * @bodyParam usageDetailsPath string Param for account only if vendorId = 1 (Azure). Example: "testdetailspath"
     * @bodyParam apiVersion string Param for account only if vendorId = 1 (Azure). Example: "testApiVersion"
     *
     * @responseFile 200 responses/accountAdd.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param AddAccountRequest $request
     * @return JsonResponse
     * @throws ClientSearchExceptions
     * @throws ForbiddenExceptions
     */
    public function addAccount(AddAccountRequest $request)
    {
        try {
            Rbac::canAccountControl($this->user);

            return new JsonResponse(
                new AccountAddDataResponse(
                    $this->process(
                        AccountAdd::getCommand()
                            ->setStatusId($request->get('statusId'))
                            ->setClientId($request->get('clientId'))
                            ->setAccountName($request->get('accountName'))
                            ->setBusinessUnitId($request->get('businessUnitId'))
                            ->setVendorId($request->get('vendorId'))
                            ->setSubBusinessUnitId($request->get('subBusinessUnitId'))
                            ->setEnrollmentId($request->get('enrollmentId'))
                            ->setAccountNumber($request->get('accountNumber'))
                            ->setaRN($request->get('aRN'))
                            ->setBucketName($request->get('bucketName'))
                            ->setTenant($request->get('tenant'))
                            ->setClientIdKey($request->get('clientIdKey'))
                            ->setClientSecret($request->get('clientSecret'))
                            ->setSubscriptionId($request->get('subscriptionId'))
                            ->setUsageDetailsPath($request->get('usageDetailsPath'))
                            ->setApiVersion($request->get('apiVersion'))
                    )
                )
            );
        } catch (Exception $exception) {

            throw $exception;
        } catch (ClientSearchExceptions $exception) {

            throw $exception;
        }
    }

    /**
     * Update Account
     *
     * @bodyParam accountId integer required Param for related account id. Example: 1
     * @bodyParam vendorId integer required Param for Azure = 1 or AWS = 2 provider. Example: 1,2
     * @bodyParam accountNumber string required Param account number(Azure, AWS). Example: "wvwrgOgrwgkrwg"
     * @bodyParam accountName string required Param account name(Azure, AWS). Example: "Test account"
     * @bodyParam statusId integer required Param account status(Azure, AWS). Example: 1
     * @bodyParam businessUnitId integer required Param for account business unit(Azure, AWS). Example: 1
     * @bodyParam clientId integer required Param for account client(Azure, AWS). Example: 1
     * @bodyParam tenant string required Param for account only if vendorId = 1(Azure). Example: "Test tenant"
     * @bodyParam clientIdKey string required Param for account only if vendorId = 1(Azure). Example: "GrswhehErwystymzdtehzdth"
     * @bodyParam clientSecret string required Param for account only if vendorId = 1(Azure). Example: "P09214tgowlnvgaenjrg"
     * @bodyParam subscriptionId string required Param for account only if vendorId = 1(Azure). Example: "qweqweqTHbddfQefqegEgA"
     * @bodyParam subBusinessUnitId integer Param for account sub business unit(Azure, AWS). Example: "qweqweqTHbddfQefqegEgA"
     * @bodyParam aRN string required Param for account only if vendorId = 2(AWS). Example: "qweqweqTHbddfQefqegEgA"
     * @bodyParam bucketName string required Param for account only if vendorId = 2(AWS). Example: "qweqweqTHbddfQefqegEgA"
     * @bodyParam enrollmentId string Param for account(Azure, AWS). Example: "qweqweqTHbddfQefqegEgAqefqefqekutklug$wrwrt"
     * @bodyParam usageDetailsPath string Param for account only if vendorId = 1 (Azure). Example: "testdetailspath"
     * @bodyParam apiVersion string Param for account only if vendorId = 1 (Azure). Example: "testApiVersion"
     *
     * @responseFile 204 responses/accountUpdate.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param UpdateAccountRequest $request
     * @return Response|ResponseFactory
     * @throws ClientSearchExceptions
     * @throws ForbiddenExceptions
     */
    public function updateAccount(UpdateAccountRequest $request)
    {
        try {
            Rbac::canAccountControl($this->user);
            $this->process(
                AccountUpdate::getCommand()
                    ->setClientId($request->get('clientId'))
                    ->setSubBusinessUnitId($request->get('subBusinessUnitId'))
                    ->setAccountId($request->get('accountId'))
                    ->setAccountName($request->get('accountName'))
                    ->setBusinessUnitId($request->get('businessUnitId'))
                    ->setStatusId($request->get('statusId'))
                    ->setEnrollmentId($request->get('enrollmentId'))
                    ->setAccountNumber($request->get('accountNumber'))
                    ->setaRN($request->get('aRN'))
                    ->setBucketName($request->get('bucketName'))
                    ->setTenant($request->get('tenant'))
                    ->setClientIdKey($request->get('clientIdKey'))
                    ->setClientSecret($request->get('clientSecret'))
                    ->setSubscriptionId($request->get('subscriptionId'))
                    ->setUsageDetailsPath($request->get('usageDetailsPath'))
                    ->setApiVersion($request->get('apiVersion'))
                    ->setVendorId($request->get('vendorId'))
            );

            return response('', 204);
        } catch (Exception $exception) {

            throw $exception;
        } catch (ClientSearchExceptions $exception) {

            throw $exception;
        }
    }

    /**
     * Resource List
     *
     * @queryParam clientId required integer Param for filtering related Client. Example: 2.
     *
     * @responseFile 200 responses/resourceList.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param ResourceListRequest $request
     * @return JsonResponse
     */
    public function resources(ResourceListRequest $request)
    {

        try {

            $command = ResourceList::getCommand();
            $command->setClientId($request->get('clientId'));

            return new JsonResponse(new ResourceListResponse($this->process($command)), Response::HTTP_OK);

        } catch (Exception $exception) {

            throw $exception;

        }

    }
}
