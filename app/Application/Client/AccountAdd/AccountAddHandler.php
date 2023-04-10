<?php

namespace App\Application\Client\AccountAdd;

use App\Application\HandlerBase;
use App\Contract\CommandBus\Client\AccountAddCommandInterface;
use App\Contract\CommandBus\Client\AccountAddHandlerInterface;
use App\Domain\Account\AccountFilter;
use App\Domain\Account\AccountRepositoryInterface;
use App\Domain\Client\ClientRepositoryInterface;
use App\Exceptions\Client\ClientSearchExceptions;

/**
 * Class AccountAddHandler
 * @package App\Application\Client\AccountAdd
 */
class AccountAddHandler extends HandlerBase implements AccountAddHandlerInterface
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
     * @param AccountAddCommandInterface $command
     * @return array
     * @throws ClientSearchExceptions
     */
    public function work(AccountAddCommandInterface $command): array
    {
        if (!$client = $this->clientRepository->byId($command->getClientId())) {

            throw new ClientSearchExceptions($command->getClientId());
        }

        return $this->accountRepository->addAccount($this->createFilterWithPropertiesData($command));
    }


    /**
     * @param AccountAddCommandInterface $command
     * @return AccountFilter
     */
    private function createFilterWithPropertiesData(AccountAddCommandInterface $command): AccountFilter
    {
        return $this->accountRepository
            ->getAccountFilter()
            ->setClientId($command->getClientId())
            ->setAccountName($command->getAccountName())
            ->setStatusId($command->getStatusId())
            ->setBusinessUnitId($command->getBusinessUnitId())
            ->setVendorId($command->getVendorId())
            ->setSubBusinessUnitId($command->getSubBusinessUnitId())
            ->setEnrollmentId($command->getEnrollmentId())
            ->setAccountNumber($command->getAccountNumber())
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
