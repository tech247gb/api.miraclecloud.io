<?php

namespace App\Infrastructure\Response\Client;

use Illuminate\Http\Resources\Json\Resource;

class ClientListDataResponse extends Resource
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
            $data[] = [
                'type' => 'client',
                'id' => $datum->id,
                'attributes' => [
                    'clientid' => $datum->id,
                    'clientname' => $datum->name,
                    'joiningdate' => $datum->joinDate,
                    'active' => $datum->status,
                ],
            ];
        }

        return $data;
    }
}
