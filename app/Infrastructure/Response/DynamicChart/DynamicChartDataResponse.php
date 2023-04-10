<?php


namespace App\Infrastructure\Response\DynamicChart;


use Illuminate\Http\Resources\Json\Resource;

class DynamicChartDataResponse extends Resource
{

    public function toArray($request)
    {
        return [
            'type' => 'dynamicChart',
            'data' => $this->resource
        ];
    }

}
