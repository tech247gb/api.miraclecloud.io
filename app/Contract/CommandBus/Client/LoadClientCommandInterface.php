<?php

namespace App\Contract\CommandBus\Client;

use App\Contract\CommandBus\CommandInterface;

/**
 * Interface LoadClientCommandInterface
 * @package App\Contract\CommandBus\Client
 */
interface LoadClientCommandInterface extends CommandInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self;
}
