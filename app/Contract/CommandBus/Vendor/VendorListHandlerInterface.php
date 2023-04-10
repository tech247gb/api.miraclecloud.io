<?php


namespace App\Contract\CommandBus\Vendor;


use Illuminate\Support\Collection;

interface VendorListHandlerInterface
{

    /**
     * @param VendorListCommandInterface $command
     * @return Collection
     */
    public function work(VendorListCommandInterface $command): Collection;

}
