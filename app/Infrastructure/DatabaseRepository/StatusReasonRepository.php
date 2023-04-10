<?php

declare(strict_types = 1);

namespace App\Infrastructure\DatabaseRepository;


use App\Domain\StatusReason\{
    StatusReason,
    StatusReasonFilter
};
use App\Domain\Dashboard\DbModel;
use Illuminate\Support\Collection;

/**
 * Class StatusReasonRepository
 * @package App\Infrastructure\DatabaseRepository
 *
 * @property DbModel $model
 */
class StatusReasonRepository
{

    /** @var DbModel $model */
    private $model;

    /**
     * StatusReasonRepository constructor.
     * @param DbModel $model
     */
    public function __construct(DbModel $model)
    {
        $this->model = $model;
    }

    /**
     * @return StatusReason
     */
    public function getModel(): StatusReason
    {
        return new StatusReason();
    }

    /**
     * @return StatusReasonFilter
     */
    public function getFilter(): StatusReasonFilter
    {
        return new StatusReasonFilter();
    }

    /**
     * @param StatusReasonFilter $statusReasonFilter
     *
     * @return Collection
     */
    public function all(StatusReasonFilter $statusReasonFilter): Collection
    {
        return $this->mapList(
            $this->model->getStatusReasonList($this->filterListParams($statusReasonFilter))
        );
    }

    /**
     * @param Collection $statusReasonList
     *
     * @return Collection
     */
    private function mapList(Collection $statusReasonList): Collection
    {
        return $statusReasonList->map(function ($statusReasonModel) {

            $statusReason = $this->getModel();
            $statusReason->setReasonId($statusReasonModel->ReasonID);
            $statusReason->setReasonDescription($statusReasonModel->ReasonDescription);

            return $statusReason;
        });
    }

    /**
     * @param StatusReasonFilter $statusReasonFilter
     *
     * @return array
     */
    private function filterListParams(StatusReasonFilter $statusReasonFilter): array
    {
        return [
            $statusReasonFilter->getStatusId()
        ];
    }
}
