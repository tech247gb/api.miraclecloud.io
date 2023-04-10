<?php

namespace App\Infrastructure\DatabaseRepository;

use App\Contract\Core\SortingInterface;
use App\Domain\Dashboard\DbModel;
use App\Domain\User\User;
use App\Domain\User\UserFilter;
use App\Domain\User\UserRepositoryInterface;
use Illuminate\Support\Collection;

/**
 * Class UserRepository
 * @package App\Infrastructure\DatabaseRepository
 */
class UserRepository implements UserRepositoryInterface
{
    /** @var DbModel $model */
    private $model;

    /**
     * UserRepository constructor.
     * @param DbModel $model
     */
    public function __construct(DbModel $model)
    {
        $this->model = $model;
    }

    /**
     * @param UserFilter $filter
     * @param SortingInterface|null $sorting
     * @return Collection
     */
    public function all(UserFilter $filter, ?SortingInterface $sorting = null): Collection
    {
        $builder = $this->filter($filter);

        if ($sorting) {
            $builder->orderBy($sorting->getField(), $sorting->getDirection());
        }

        return $builder->get();
    }

    /**
     * @param UserFilter $filter
     * @return User|null
     */
    public function one(UserFilter $filter): ?User
    {
        $user = $this->model->userLogin($this->filter($filter));

        if (!$user->first()) {

            return null;
        }

        return User::getModel()->load((array)$user->first());
    }

    /**
     * @param UserFilter $filter
     * @return User|null
     */
    public function ssoLogin(UserFilter $filter): ?User
    {
        $user = $this->model->userLoginSso($this->ssoFilter($filter));

        if (!$user->first()) {

            return null;
        }

        return User::getModel()->load((array)$user->first());
    }

    /**
     * @param UserFilter $filter
     * @return User|null
     */
    public function samlLogin(UserFilter $filter): ?User
    {
        $user = $this->model->userLoginSaml($this->samlFilter($filter));

        if (!$user->first()) {

            return null;
        }

        return User::getModel()->load((array)$user->first());
    }

    /**
     * @param UserFilter $filter
     * @return User|null
     */
    public function azurLogin(UserFilter $filter): ?User
    {
        $user = $this->model->userLoginSaml($this->samlFilter($filter));

        if (!$user->first()) {

            return null;
        }

        return User::getModel()->load((array)$user->first());
    }


    /**
     * @param $filter
     * @return array
     */
    public function getPrivateKey($filter): array
    {

        return $this->model->getPrivateKey([$filter]);
    }

    /**
     * @param int $id
     * @return User|null
     */
    public function byId(int $id): ?User
    {
        return $this->model
            ->where('id', $id)
            ->first();
    }

    /**
     * @param UserFilter $filter
     * @return array
     */
    private function filter(UserFilter $filter)
    {
        return [
            $filter->getEmail(),
            $filter->getPassword(),
            $filter->getIp()
        ];
    }

    /**
     * @param UserFilter $filter
     * @return array
     */
    private function ssoFilter(UserFilter $filter)
    {
        return [
            $filter->getEmail(),
            $filter->getName()
        ];
    }

    /**
     * @param UserFilter $filter
     * @return array
     */
    private function samlFilter(UserFilter $filter)
    {
        return [
            $filter->getEmail()
        ];
    }

    public function getUserRepositoryFilter(): UserFilter
    {
        return new UserFilter();
    }
}
