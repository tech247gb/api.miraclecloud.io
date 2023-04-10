<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Infrastructure\Services\FileService;
use App\Contract\Core\StorageDriverInterface;
use App\Exceptions\RequestValidationException;
use App\Contract\CommandBus\CommandBusInterface;
use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Infrastructure\Services\Reader\AzureAccountAppReader;
use App\Http\Requests\AzureAccount\AzureAccountAppStoreRequest;
use App\Http\Requests\AzureAccount\AzureAccountAppUploadRequest;
use App\Application\AzureAccount\Command\Store\AzureAccountStore;
use App\Infrastructure\Response\AzureAccount\AzureAccountResponse;
use App\Application\AzureAccount\Query\ByClientId\AzureAccountByClientId;
use App\Infrastructure\Response\AzureAccountApp\AzureAccountAppListResponse;
use App\Application\AzureAccountApp\Query\Command\BulkLoad\AzureAccountAppBulkLoad;
use App\Application\AzureAccountApp\Query\ListByClientId\AzureAccountAppListByClientId;

/**
 * @group AzureAccount
 */
class AzureAccountController extends Controller
{
    /** @var FileService */
    protected $fileService;

    public function __construct(
        FileService $fileService,
        CommandBusInterface $commandBus
    ) {
        parent::__construct($commandBus);
        $this->fileService = $fileService;
    }

    /**
     * Azure Account View.
     *
     * @queryParam clientId required Param integer to related client id. Example: 2
     *
     * @responseFile 200 responses/azureAccount/azureAccount.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     */
    public function view(int $clientId)
    {
        $accountCommand = AzureAccountByClientId::getCommand([
            'clientId' => $clientId,
        ]);
        $azureAccount = $this->process($accountCommand);

        return $this->getResponse(new AzureAccountResponse($azureAccount));
    }

    /**
     * Azure Account App List.
     *
     * @queryParam clientId required Param integer to related client id. Example: 2
     *
     * @responseFile 200 responses/azureAccountApp/azureAccountAppList.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     */
    public function appList(int $clientId)
    {
        $accountCommand = AzureAccountAppListByClientId::getCommand([
            'clientId' => $clientId,
        ]);
        $azureAccount = $this->process($accountCommand);

        return $this->getResponse(new AzureAccountAppListResponse($azureAccount));
    }

    /**
     * Azure Account Uploads Apps.
     *
     * @queryParam clientId required Param integer to related client id. Example: 2
     * @bodyParam file file required Uploaded file.
     *
     * @responseFile 204 responses/noContent.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     */
    public function appUpload(int $clientId, AzureAccountAppUploadRequest $request)
    {
        try {
            $fileName = $this->fileService->generateFileName($request->file('file')->getClientOriginalName());
            $request->file('file')->storeAs(StorageDriverInterface::TEMP_STORAGE, $fileName);

            if (! $this->fileService->fileExist(StorageDriverInterface::LOCAL_DISK, StorageDriverInterface::TEMP_STORAGE, $fileName)) {
                throw new \RuntimeException('Error occurred while save file');
            }
            $fileRealPath = $this->fileService->fullPath(StorageDriverInterface::LOCAL_DISK, StorageDriverInterface::TEMP_STORAGE, $fileName);

            $reader = new AzureAccountAppReader();
            $reader->openFile($fileRealPath);
            $accountsIds = [];
            foreach ($reader->next() as $data) {
                $accountsIds[] = $data;
            }
            $accountsIds = \implode(',', $accountsIds);
            if (\mb_strlen($accountsIds) > 4000) {
                throw new \DomainException('List accountIds too long');
            }

            $accountCommand = AzureAccountAppBulkLoad::getCommand([
                'clientId' => $clientId,
                'accountsIds' => $accountsIds,
            ]);

            $azureAccount = $this->process($accountCommand);

            $this->fileService->delete(
                StorageDriverInterface::LOCAL_DISK,
                StorageDriverInterface::TEMP_STORAGE,
                $fileName
            );

            return response('', 204);
        } catch (\Throwable $e) {
            throw new RequestValidationException(ValidationExceptionCodeInterface::AZURE_ACCOUNT_APP_BULK_LOAD_EXCEPTION, [$e->getMessage()], 422);
        }
    }

    /**
     * Azure Account Store.
     *
     * @queryParam clientId required Param integer to related client id. Example: 2
     * @bodyParam  tenant string required, Tenant id. Example: 341412413-234234123
     * @bodyParam  clientIdKey string required, ClientIdKey id. Example: 341412413-234234123
     * @bodyParam  clientSecret string required, ClientSecret id. Example: 341412413-234234123
     * @bodyParam  subscriptionId string required, SubscriptionId id. Example: 341412413-234234123
     * @bodyParam  listAccountIds array required Account ids integers
     *
     * @responseFile 204 responses/noContent.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     */
    public function store(int $clientId, AzureAccountAppStoreRequest $request)
    {
        try {
            $listAccountIds = \implode(',', $request->get('listAccountIds'));
            if (\mb_strlen($listAccountIds) > 4000) {
                throw new \DomainException('List accountIds too long');
            }

            $accountCommand = AzureAccountStore::getCommand([
                'clientId' => $clientId,
                'tenant' => $request->get('tenant'),
                'clientIdKey' => $request->get('clientIdKey'),
                'clientSecret' => $request->get('clientSecret'),
                'subscriptionId' => $request->get('subscriptionId'),
                'listAccountIDs' => $listAccountIds,
            ]);
            $azureAccount = $this->process($accountCommand);

            return response('', 204);
        } catch (\Throwable $e) {
            throw new RequestValidationException(ValidationExceptionCodeInterface::AZURE_ACCOUNT_STORE_EXCEPTION, [$e->getMessage()], 422);
        }
    }
}
