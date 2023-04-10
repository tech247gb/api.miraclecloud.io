<?php

namespace App\Infrastructure\Response\BusinessUnit;

use Illuminate\Http\Resources\Json\Resource;

class BusinessUnitListDataResponse extends Resource
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
            'data' => $this->getDataWithRelations(),
        ];
    }

    private function getDataWithRelations()
    {
        $data = [];

        foreach ($this->resource as &$datum) {

            $data[] = new BusinessUnitDataResponse($datum);
        }

        return $data;
    }
}
