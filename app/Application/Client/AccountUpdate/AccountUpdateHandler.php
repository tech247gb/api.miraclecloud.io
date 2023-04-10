<?php

namespace App\Application\Client\AccountUpdate;

use App\Application\HandlerBase;
use App\Contract\CommandBus\Client\AccountUpdateCommandInterface;
use App\Contract\CommandBus\Client\AccountUpdateHandlerInterface;
use App\Domain\Account\AccountFilter;
use App\Domain\Account\AccountRepositoryInterface;
use App\Domain\Client\ClientRepositoryInterface;
use App\Exceptions\Client\ClientSearchExceptions;

/**
 * Class AccountUpdateHandler
 * @package App\Application\Client\AccountUpdate
 *
 *  @property AccountRepositoryInterface $accountRepository
 *  @property ClientRepositoryInterface $clientRepository
 */
class AccountUpdateHandler extends HandlerBase implements AccountUpdateHandlerInterface
{
    /** @var AccountRepositoryInterface $accountRepository */
    private $accountRepository;
    /** @var ClientRepositoryInterface $accountRepository */
    private $clientRepository;

    /**
     * AccountUpdateHandler constructor.
     * @param ClientRepositoryInterface $clientRepository
     * @param AccountRepositoryInterface $accountRepository
     */
    public function __construct(ClientRepositoryInterface $clientRepository, AccountRepositoryInterface $accountRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->accountRepository = $accountRepository;
    }

    /**
     * @param AccountUpdateCommandInterface $command
     * @return array|void
     * @throws ClientSearchExceptions
     */
    public function work(AccountUpdateCommandInterface $command): array
    {
        if (!$client = $this->clientRepository->byId($command->getClientId())) {

            throw new ClientSearchExceptions($command->getClientId());
        }

        return $this->accountRepository->updateAccount($this->createFilterWithPropertiesData($command));
    }


    /**
     * @param AccountUpdateCommandInterface $command
     * @return AccountFilter
     */
    private function createFilterWithPropertiesData(AccountUpdateCommandInterface $command): AccountFilter
    {
        return $this->accountRepository
            ->getAccountFilter()
            ->setAccountId($command->getAccountId())
            ->setClientId($command->getClientId())
            ->setAccountNumber($command->getAccountNumber())
            ->setAccountName($command->getAccountName())
            ->setStatusId($command->getStatusId())
            ->setBusinessUnitId($command->getBusinessUnitId())
            ->setVendorId($command->getVendorId())
            ->setSubBusinessUnitId($command->getSubBusinessUnitId())
            ->setEnrollmentId($command->getEnrollmentId())
            ->setARN($command->getARN())
            ->setBucketName($command->getBucketName())
            ->setTenant($command->getTenant())
            ->setClientIdKey($command->getClientIdKey())
            ->setClientSecret($command->getClientSecret())
            ->setSubscriptionId($command->getSubscriptionId())
            ->setUsageDetailsPath($command->getUsageDetailsPath())
            ->setApiVersion($command->getApiVersion());
    }

}
