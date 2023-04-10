<?php


namespace App\Infrastructure\Response\PowerBI;


use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Collection;

class PowerBIReportListResponse extends Resource
{

    /**
     * @var Collection
     */
    public $resource;

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->map(function ($report){
            return new PowerBIReportResponse($report);
        })
            ->all();
    }

}
