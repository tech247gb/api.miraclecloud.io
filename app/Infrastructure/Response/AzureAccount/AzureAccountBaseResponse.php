<?php

declare(strict_types=1);

namespace App\Infrastructure\Response\AzureAccount;

use Illuminate\Http\Resources\Json\Resource;

/**
 * @property \App\Domain\AzureAccount\AzureAccount $resource;
 */
class AzureAccountBaseResponse extends Resource
{
    public function toArray($request)
    {
        return [
            'type' => 'azureAccount',
            'id' => $this->resource->id,
            'attributes' => [
                'clientId' => $this->resource->id,
                'tenant' => $this->resource->tenant,
                'clientIdKey' => $this->resource->clientIdKey,
                'clientSecret' => $this->resource->clientSecret,
                'subscriptionId' => $this->resource->subscriptionId,
            ],
        ];
    }
}
