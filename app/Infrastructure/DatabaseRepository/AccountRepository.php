<?php

namespace App\Infrastructure\DatabaseRepository;

use App\Domain\Account\AccountFilter;
use App\Domain\Account\AccountRepositoryInterface;
use App\Domain\Dashboard\DbModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Mockery\Exception;

/**
 * Class BusinessUnitRepository
 * @package App\Infrastructure\DatabaseRepository
 */
class AccountRepository implements AccountRepositoryInterface
{
    /** @var Builder $model */
    private $model;

    /**
     * AccountRepository constructor.
     */
    public function __construct()
    {
        /** @var DbModel $model */
        $this->model = new DbModel();
    }

    /**
     * @param int $accountId
     */
    public function accountEnable(int $accountId):void
    {
        try {
            $this->model->accountEnable([
                $accountId,
            ]);
        } catch (Exception $exception) {

        }
    }

    /**
     * @param int $accountId
     */
    public function accountDisable(int $accountId):void
    {
        try {
            $this->model->accountDisable([
                $accountId,
            ]);
        } catch (Exception $exception) {

        }
    }
    /**
     * @param int $accountId
     */
    public function accountDelete(int $accountId):void
    {
        try {
            $this->model->accountDelete([
                $accountId,
            ]);
        } catch (Exception $exception) {

        }
    }

    /**
     * @param AccountFilter $filter
     * @return array
     */
    public function addAccount(AccountFilter $filter)
    {
       return   $this->model->addAccount($this->addAccountFilter($filter))->all();
    }

    /**
     * @param AccountFilter $filter
     * @return array
     */
    public function updateAccount(AccountFilter $filter)
    {
       return   $this->model->updateAccount($this->updateAccountFilter($filter))->all();
    }

    /**
     * @param AccountFilter $filter
     * @return Collection
     */
    public function accountListDynamicDashboard(AccountFilter $filter): Collection
    {
        return $this->model->accountListDynamicDashboard(
            $this->accountListDynamicDashboardFilter($filter)
        );
    }

    /**
     * @param AccountFilter $filter
     * @return array
     */
    private function accountListDynamicDashboardFilter(AccountFilter $filter): array
    {
        return [
            $filter->getClientId()
        ];
    }


    /**
     * @param AccountFilter $filter
     * @return array
     */
    private function addAccountFilter(AccountFilter $filter)
    {
        return [
            $filter->getAccountNumber(),
            $filter->getAccountName(),
            $filter->getStatusId(),
            $filter->getBusinessUnitId(),
            $filter->getClientId(),
            $filter->getVendorId(),
            $filter->getSubBusinessUnitId(),
            $filter->getEnrollmentId(),
            $filter->getARN(),
            $filter->getBucketName(),
            $filter->getTenant(),
            $filter->getClientIdKey(),
            $filter->getClientSecret(),
            $filter->getSubscriptionId(),
            $filter->getUsageDetailsPath(),
            $filter->getApiVersion(),
        ];
    }
    /**
     * @param AccountFilter $filter
     * @return array
     */
    private function updateAccountFilter(AccountFilter $filter)
    {
        return [
            $filter->getAccountId(),
            $filter->getAccountNumber(),
            $filter->getAccountName(),
            $filter->getStatusId(),
            $filter->getBusinessUnitId(),
            $filter->getClientId(),
            $filter->getVendorId(),
            $filter->getSubBusinessUnitId(),
            $filter->getEnrollmentId(),
            $filter->getARN(),
            $filter->getBucketName(),
            $filter->getTenant(),
            $filter->getClientIdKey(),
            $filter->getClientSecret(),
            $filter->getSubscriptionId(),
            $filter->getUsageDetailsPath(),
            $filter->getApiVersion(),
        ];
    }

    /**
     * @return AccountFilter
     */
    public function getAccountFilter(): AccountFilter
    {
        return new AccountFilter();
    }

    /**
     * @param int $clientId
     * @return \Illuminate\Support\Collection
     */
    public function getYear(int $clientId)
    {
        return $this->model->getYear(
            [
                $clientId
            ]);
    }
}
