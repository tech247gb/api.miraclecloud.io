<?php

declare(strict_types=1);

namespace App\Infrastructure\Response\AzureAccountApp;


use Illuminate\Http\Resources\Json\Resource;

/**
 * @property \App\Domain\AzureAccount\AzureAccountApp $resource;
 */
class AzureAccountAppResponse extends Resource
{
    public function toArray($request)
    {
        return [
            'data' => new AzureAccountAppBaseResponse($this->resource)
        ];
    }
}
