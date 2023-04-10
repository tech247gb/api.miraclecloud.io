<?php

namespace App\Domain\User;

use App\Contract\Core\SortingInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

/**
 * Interface RepositoryInterface
 * @package App\Domain
 */
interface UserRepositoryInterface
{
    /**
     * @param UserFilter $filter
     * @param SortingInterface|null $sorting
     * @return Collection
     */
    public function all(UserFilter $filter, ?SortingInterface $sorting = null): Collection;

    /**
     * @param UserFilter $filter
     * @return User|null
     */
    public function one(UserFilter $filter): ?User;

    /**
     * @param UserFilter $filter
     * @return User|null
     */
    public function ssoLogin(UserFilter $filter): ?User;

    /**
     * @param int $id
     * @return User|null
     */
    public function byId(int $id): ?User;

    /**
     * @return UserFilter
     */
    public function getUserRepositoryFilter(): UserFilter;

    /**
     * @param UserFilter $filter
     * @return User|null
     */
    public function samlLogin(UserFilter $filter): ?User;
}
