<?php

namespace App\Infrastructure\Response\Client;

use Illuminate\Http\Resources\Json\Resource;

class AccountGetDataResponse extends Resource
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

        return new AccountDataResponse($this->resource[0]);
    }
}
