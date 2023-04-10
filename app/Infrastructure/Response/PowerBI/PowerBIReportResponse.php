<?php


namespace App\Infrastructure\Response\PowerBI;


use App\Domain\PowerBI\Report;
use Illuminate\Http\Resources\Json\Resource;

class PowerBIReportResponse extends Resource
{

    /**
     * @var Report
     */
    public $resource;

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'type' => 'report',
                'attributes' => [
                    'title' => $this->resource->getTitle(),
                    'type' => $this->resource->getType(),
                    'group_id' => $this->resource->getGroupId(),
                    'report_id' => $this->resource->getReportId(),
                    'main' => $this->resource->getMain(),
                    'dashboardID' => $this->resource->getDashboardID(),
                    'dashboardType' => $this->resource->getDashboardType(),
                    'filter' => $this->resource->getFilter()
                ]
            ]
        ];
    }

}
