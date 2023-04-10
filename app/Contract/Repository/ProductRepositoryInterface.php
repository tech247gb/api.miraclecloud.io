<?php


namespace App\Contract\Repository;


use Illuminate\Support\Collection;

interface ProductRepositoryInterface
{

    /**
     * @return Collection
     */
    public function all(): Collection;

}
