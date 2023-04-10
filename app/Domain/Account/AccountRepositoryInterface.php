<?php

namespace App\Domain\Account;

use App\Domain\Client\ClientRepositoryInterface;
use Illuminate\Support\Collection;

/**
 * Interface AccountRepositoryInterface
 * @package App\Domain\AccountAdd
 */
interface AccountRepositoryInterface
{
    /**
     * @return AccountFilter
     */
    public function getAccountFilter(): AccountFilter;

    /**
     * @param AccountFilter $filter
     * @return Collection
     */
    public function accountListDynamicDashboard(AccountFilter $filter): Collection;

}
