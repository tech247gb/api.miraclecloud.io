<?php

namespace App\Infrastructure\Response\Dashboard;

use Illuminate\Http\Resources\Json\Resource;

class YearDataResponse extends Resource
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
            'type' => 'year',
            'attributes' => [
                'year' => $this->resource->year,
            ],
        ];
    }
}
