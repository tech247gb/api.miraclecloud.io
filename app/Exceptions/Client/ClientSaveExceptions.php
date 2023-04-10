<?php

namespace App\Exceptions\Client;

use App\Domain\Client\Client;
use App\Exceptions\CustomExceptionInterface;
use Exception;
use Illuminate\Support\Facades\Log;

/**
 * Class ClientSaveExceptions
 * @package App\Domain\Client
 */
class ClientSaveExceptions extends Exception implements CustomExceptionInterface
{
    /**
     * @var int $errorCode
     */
    private $errorCode;

    public function __construct(Client $client)
    {
        $this->errorCode = 20110;
        Log::warning('Client not save, data: ' . print_r($client, true));

        parent::__construct(sprintf('Client with id %d not save', $client->id), 422, null);
    }

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->errorCode;
    }
}
