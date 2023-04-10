<?php


namespace App\Infrastructure\Response\PowerBI;


use App\Domain\Service\Service;
use Illuminate\Http\Resources\Json\Resource;

class PowerBIEmbedTokenResponse extends Resource
{

    /**
     * @var Service
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
                'type' => 'embedToken',
                'id' => $this->resource['tokenId'],
                'attributes' => [
                    'report_id' => '5cd710be-a9f8-4a85-bebe-ae9f291c6d13',
                    'group_id' => '763193b9-0679-4d1d-9c7c-c279d10ec4da',
                    'token' => $this->resource['token'],
                    'expiration' => $this->resource['expiration'],
                ]
            ]
        ];
    }

}
