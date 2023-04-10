<?php


namespace App\Infrastructure\Response\DashboardTable;


use Illuminate\Http\Resources\Json\Resource;

class DashboardTableDataResponse extends Resource
{

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type' => 'dashboardTable',
            'data' => $this->resource
        ];
    }

}
