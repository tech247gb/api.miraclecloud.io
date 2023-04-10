<?php


namespace App\Contract\Repository;


use App\Domain\Sso\SsoFilter;
use Illuminate\Support\Collection;

interface SsoRepositoryInterface
{
    /**
     * @return SsoFilter
     */
    public function getSourceFilter(): SsoFilter;

    public function ssoByCertificate(SsoFilter $filter): Collection;
}
