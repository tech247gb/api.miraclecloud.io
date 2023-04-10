<?php

declare(strict_types=1);

namespace App\Infrastructure\Response\AzureAccountApp;


use Illuminate\Http\Resources\Json\Resource;

/**
 * @property \App\Domain\AzureAccount\AzureAccountApp $resource;
 */
class AzureAccountAppBaseResponse extends Resource
{
    public function toArray($request)
    {
        return [
            'type' => 'azureAccountApp',
            'id' => (string) $this->resource->accountId,
            'attributes' => [
                'accountId' => (string) $this->resource->accountId,
                'accountName' => $this->resource->accountName,
                'accountNumber' => $this->resource->accountNumber,
                'assigned' => $this->resource->assigned,
            ]
        ];
    }
}
