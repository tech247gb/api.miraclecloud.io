<?php

namespace App\Infrastructure\Response\Client;

use Illuminate\Http\Resources\Json\Resource;

class AccountAddResponse extends Resource
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
            'data' => [
                'type' => 'account',
                'id' => $this->resource->AccountID,
                'attributes' => [
                    'accountId' => $this->resource->AccountID,
                ],
            ]
        ];
    }


}
