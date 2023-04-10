<?php


namespace App\Application\Owner\OwnerList;


use App\Application\Core\CommandBase;

class OwnerList extends CommandBase
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
     * @return OwnerList
     */
    public function setClientId(int $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }


    /**
     * @return bool
     */
    public function validateCommand(): bool
    {
        return true;
    }

}
