<?php


namespace App\Contract\CommandBus\DynamicDashboard\AccountList;


use Illuminate\Support\Collection;

interface AccountListHandlerInterface
{

    /**
     * @param AccountListCommandInterface $command
     * @return Collection
     */
    public function work(AccountListCommandInterface $command): Collection;

}
