<?php

namespace App\Exceptions\Client;

use App\Domain\Client\Client;
use App\Exceptions\CustomExceptionInterface;
use Exception;
use Illuminate\Support\Facades\Log;

/**
 * Class ClientDeleteExceptions
 * @package App\Exceptions\Client
 */
class AccountListExceptions extends Exception implements CustomExceptionInterface
{
    /**
     * @var int $errorCode
     */
    private $errorCode;

    public function __construct(Client $client)
    {
        $this->errorCode = 20410;
        Log::notice('client has no account , data: ' . print_r($client, true));

        parent::__construct(sprintf('Client with id %d has no account', $client->id), 403, null);
    }

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->errorCode;
    }
}
