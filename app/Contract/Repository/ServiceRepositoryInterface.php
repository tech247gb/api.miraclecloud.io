<?php


namespace App\Contract\Repository;


use App\Domain\Service\ServiceFilter;

interface ServiceRepositoryInterface
{

    /**
     * @return ServiceFilter
     */
    public function getServiceFilter(): ServiceFilter;

    /**
     * @param ServiceFilter $filter
     * @return array
     */
    public function getAll(ServiceFilter $filter): array;

}
