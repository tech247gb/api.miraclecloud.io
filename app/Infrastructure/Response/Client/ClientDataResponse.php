<?php

namespace App\Infrastructure\Response\Client;

use Illuminate\Http\Resources\Json\Resource;

class ClientDataResponse extends Resource
{
    /**
     * @var bool for don't sanitize int keys
     */
    public $preserveKeys = true;

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'type' => 'client',
                'id' => $this->resource->id,
                'attributes' => [
                    'clientid' => $this->resource->id,
                    'clientname' => $this->resource->name,
                    'joiningdate' => $this->resource->joinDate,
                ],
            ],
        ];
    }
}
