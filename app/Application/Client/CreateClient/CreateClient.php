<?php

namespace App\Application\Client\CreateClient;

use App\Application\Client\LoadClient\LoadClient;
use App\Contract\CommandBus\Client\CreateClientCommandInterface;

/**
 * Class CreateClient
 * @package App\Application\Client
 */
class CreateClient extends LoadClient implements CreateClientCommandInterface
{

}
