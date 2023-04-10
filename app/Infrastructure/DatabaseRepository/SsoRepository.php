<?php

namespace App\Infrastructure\DatabaseRepository;

use App\Contract\Repository\SsoRepositoryInterface;
use App\Domain\Dashboard\DbModel;
use App\Domain\Sso\Sso;
use App\Domain\Sso\SsoFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

/**
 * Class BusinessUnitRepository
 * @package App\Infrastructure\DatabaseRepository
 */
class SsoRepository implements SsoRepositoryInterface
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
     * @return SsoFilter
     */
    public function getSourceFilter(): SsoFilter
    {
        return new SsoFilter();
    }

    public function ssoByCertificate(SsoFilter $filter): Collection
    {

        return $this->mapListAll($this->model->ssoByCertificate([$filter->getCertificate()]));
    }

    public function destinationByClient(SsoFilter $filter): Collection
    {
        return $this->mapListAll($this->model->destinationByClient([$filter->getClient()]));
    }


    /**
     * @param Collection $sources
     * @return Collection
     */
    private function mapListAll(Collection $sources): Collection
    {
        return $sources->map(function ($source) {

            $sourceModel = new Sso();
            $sourceModel->setClient($source->ClientID ?? null);
            $sourceModel->setCertificate($source->Certificate ?? null);
            $sourceModel->setType($source->Type ?? null);
            $sourceModel->setAppDestination($source->Destination ?? null);
            $sourceModel->setAppIdentity($source->Identity ?? null);

            return $sourceModel;
        });
    }
}
