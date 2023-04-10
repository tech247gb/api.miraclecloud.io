<?php

namespace App\Infrastructure\Response\AzureAccountApp;

use App\Domain\AzureAccount\AzureAccountApp;
use Illuminate\Http\Resources\Json\Resource;

/**
 * @property \Illuminate\Support\Collection $resource
 */
class AzureAccountAppListResponse extends Resource
{
    public $preserveKeys = true;

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->resource->map(static function (AzureAccountApp $item) {
                return new AzureAccountAppBaseResponse($item);
            }),
        ];
    }
}
