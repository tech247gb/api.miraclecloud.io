<?php


namespace App\Application\DynamicDashboard\Account\AccountList;


use App\Application\HandlerBase;
use App\Contract\CommandBus\DynamicDashboard\AccountList\AccountListCommandInterface;
use App\Contract\CommandBus\DynamicDashboard\AccountList\AccountListHandlerInterface;
use App\Domain\Account\AccountFilter;
use App\Domain\Account\AccountRepositoryInterface;
use Illuminate\Support\Collection;

/**
 * Class AccountListHandler
 * @package App\Application\DynamicDashboard\Account\AccountList
 *
 * @property AccountRepositoryInterface $accountRepository
 */
class AccountListHandler extends HandlerBase implements AccountListHandlerInterface
{

    /**
     * @var AccountRepositoryInterface $accountRepository
     */
    private $accountRepository;

    /**
     * AccountListHandler constructor.
     * @param AccountRepositoryInterface $accountRepository
     */
    public function __construct(AccountRepositoryInterface $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    /**
     * @param AccountListCommandInterface $command
     * @return Collection
     */
    public function work(AccountListCommandInterface $command): Collection
    {
        return $this->accountRepository->accountListDynamicDashboard(
            $this->createAccountFilter($command)
        );
    }

    /**
     * @param AccountListCommandInterface $command
     * @return AccountFilter
     */
    private function createAccountFilter(AccountListCommandInterface $command): AccountFilter
    {
        return $this->accountRepository
            ->getAccountFilter()
            ->setClientId($command->getClientId());
    }

}
