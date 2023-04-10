<?php

declare(strict_types=1);

namespace App\Infrastructure\Response\AzureAccount;

use Illuminate\Http\Resources\Json\Resource;

/**
 * @property \App\Domain\AzureAccount\AzureAccount $resource;
 */
class AzureAccountResponse extends Resource
{
    public function toArray($request)
    {
        return [
            'data' => new AzureAccountBaseResponse($this->resource),
        ];
    }
}
