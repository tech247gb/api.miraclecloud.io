<?php


namespace App\Application\Resource\ResourceList;


use App\Application\Core\CommandBase;

class ResourceList extends CommandBase
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
     * @return ResourceList
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
