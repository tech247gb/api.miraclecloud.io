<?php

namespace App\Application\Client\UpdateClient;

use App\Application\Client\LoadClient\LoadClient;
use App\Contract\CommandBus\Client\UpdateClientCommandInterface;

/**
 * Class UpdateClient
 * @package App\Application\Client
 */
class UpdateClient extends LoadClient implements UpdateClientCommandInterface
{
    /**
     * @var int $id
     */
    private $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return UpdateClientCommandInterface
     */
    public function setId(int $id): UpdateClientCommandInterface
    {
        $this->id = $id;

        return $this;
    }
}
