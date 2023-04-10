<?php

namespace App\Infrastructure\Response\BusinessUnit;

use Illuminate\Http\Resources\Json\Resource;

class BusinessUnitDataResponse extends Resource
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
            'type' => 'unit',
            'id' => $this->resource->BUID,
            'attributes' => [
                'clientid' => $this->resource->ClientID,
                'buname' => trim($this->resource->BUName),
            ],
        ];
    }
}
