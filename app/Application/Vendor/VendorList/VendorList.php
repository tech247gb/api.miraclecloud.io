<?php


namespace App\Application\Vendor\VendorList;


use App\Contract\CommandBus\CommandInterface;
use App\Contract\CommandBus\Vendor\VendorListCommandInterface;

class VendorList implements VendorListCommandInterface
{

    /**
     * @var int
     */
    private $clientId;

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->clientId;
    }

    /**
     * @param int $clientId
     * @return VendorListCommandInterface
     */
    public function setClientId(int $clientId): VendorListCommandInterface
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * @return VendorListCommandInterface
     */
    public static function getCommand(): CommandInterface
    {
        return new self();
    }

}
