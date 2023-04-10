<?php

namespace App\Http\Controllers;

use App\Contract\CommandBus\CommandBusInterface;
use App\Contract\CommandBus\CommandInterface;
use App\Contract\Core\JsonApiErrorResponseInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\Resource;
use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * Class Controller
 * @package App\Http\Controllers
 *
 */
class Controller extends BaseController
{
    /** @var CommandBusInterface $commandBus */
    private $commandBus;

    /**
     * Controller constructor.
     * @param CommandBusInterface $commandBus
     */
    public function __construct(CommandBusInterface $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * @param CommandInterface $command
     * @return mixed
     */
    public function process(CommandInterface $command)
    {
        return $this->commandBus->dispatch($command);
    }

    /**
     * @param Resource $resource
     * @param int $code
     * @param array $headers
     * @return JsonResponse
     */
    final public function getResponse(?Resource $resource, int $code = 200, array $headers = [])
    {
        return new JsonResponse($resource, $code, $headers) ;
    }
}
