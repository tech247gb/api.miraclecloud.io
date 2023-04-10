<?php


namespace App\Contract\Repository;


use Illuminate\Support\Collection;

interface ComparisonTypeRepositoryInterface
{

    /**
     * @return Collection
     */
    public function all(): Collection;

}
