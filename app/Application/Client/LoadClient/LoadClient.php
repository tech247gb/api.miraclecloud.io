<?php

namespace App\Application\Client\LoadClient;

use App\Contract\CommandBus\Client\LoadClientCommandInterface;
use App\Contract\CommandBus\CommandInterface;
use App\Infrastructure\Core\TextHelper;

/**
 * Class LoadClient
 * @package App\Application\User
 */
class LoadClient implements LoadClientCommandInterface
{
    /**
     * @var string $name
     */
    private $name;

    /**
     * @return string|null
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return LoadClientCommandInterface
     */
    public function setName(string $name): LoadClientCommandInterface
    {
        $this->name = TextHelper::slashes($name);

        return $this;
    }

    /**
     * @return static
     */
    public static function getCommand(): CommandInterface
    {
        return new static();
    }
}
