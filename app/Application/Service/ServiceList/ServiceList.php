<?php


namespace App\Application\Service\ServiceList;


use App\Contract\CommandBus\CommandInterface;
use App\Contract\CommandBus\Service\ServiceListCommandInterface;

class ServiceList implements ServiceListCommandInterface
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
     * @return ServiceListCommandInterface
     */
    public function setClientId(int $clientId): ServiceListCommandInterface
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * @return ServiceListCommandInterface
     */
    public static function getCommand(): CommandInterface
    {
        return new self();
    }

}
