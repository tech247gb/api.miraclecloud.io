<?php

namespace App\Infrastructure\Response\BusinessUnit;

use Illuminate\Http\Resources\Json\Resource;

class SubBusinessUnitDataResponse extends Resource
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
            'type' => 'subUnit',
            'id' => $this->resource->SubBUID,
            'attributes' => [
                'subBUId' => $this->resource->SubBUID,
                'bUId' => $this->resource->BUID,
                'subBUName' => $this->resource->SubBUName,
            ],
        ];
    }
}
