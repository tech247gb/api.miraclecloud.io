<?php

namespace App\Infrastructure\Services;

use App\Contract\CommandBus\CommandBusInterface;
use App\Contract\CommandBus\CommandInterface;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Container\Container;

/**
 * Class CommandBusService
 * @package App\Infrastructure\Services
 */
class CommandBusService implements CommandBusInterface
{
    /** @var Container $container */
    private $container;

    /**
     * CommandBusService constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param CommandInterface $command
     * @return mixed
     * @throws BindingResolutionException
     */
    public function dispatch(CommandInterface $command)
    {
        $class = get_class($command) . 'Handler';
        $handler = $this->container->make($class);

        return $handler->handle($command);
    }
}
