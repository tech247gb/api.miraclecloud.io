<?php


namespace App\Infrastructure\DatabaseRepository;


use App\Contract\Repository\OwnerRepositoryInterface;
use App\Domain\Dashboard\DbModel;
use App\Domain\Owner\Owner;
use App\Domain\Owner\OwnerFilter;
use Illuminate\Support\Collection;

class OwnerRepository implements OwnerRepositoryInterface
{
    /** @var DbModel $model */
    private $model;

    /**
     * OwnerRepository constructor.
     * @param DbModel $model
     */
    public function __construct(DbModel $model)
    {
        $this->model = $model;
    }

    /**
     * @param OwnerFilter $filter
     * @return Collection
     */
    public function all(OwnerFilter $filter): Collection
    {
        return $this->mapAll($this->model->getOwnerList($this->filterAll($filter)));
    }

    /**
     * @param Collection $owners
     * @return Collection
     */
    private function mapAll(Collection $owners): Collection
    {
        return $owners->map(function ($owner) {

            $ownerModel = new Owner();
            $ownerModel->setId($owner->UserID);
            $ownerModel->setFullName($owner->UserFullName);
            $ownerModel->setEmail($owner->UserEmail);

            return $ownerModel;
        });
    }

    /**
     * @return OwnerFilter
     */
    public function getOwnerFilter(): OwnerFilter
    {
        return new OwnerFilter();
    }

    /**
     * @param OwnerFilter $filter
     * @return array
     */
    private function filterAll(OwnerFilter $filter): array
    {
        return [
            $filter->getClientId()
        ];
    }

}
