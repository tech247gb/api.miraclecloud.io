<?php


namespace App\Contract\Repository;


use Illuminate\Support\Collection;

interface AlertTypeRepositoryInterface
{

    /**
     * @return Collection
     */
    public function all(): Collection;

}
