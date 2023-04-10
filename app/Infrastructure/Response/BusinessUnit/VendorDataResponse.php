<?php

namespace App\Infrastructure\Response\BusinessUnit;

use Illuminate\Http\Resources\Json\Resource;

class VendorDataResponse extends Resource
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
            'type' => 'vendor',
            'id' => $this->resource->VendorID,
            'attributes' => [
                'vendorID' => $this->resource->VendorID,
                'vendorName' => $this->resource->VendorName,
            ],
        ];
    }
}
