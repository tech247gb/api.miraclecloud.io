<?php

namespace App\Infrastructure\Response\User;

use Illuminate\Http\Resources\Json\Resource;

class SsoResource extends Resource
{

    public function toArray($request)
    {
        return [
            'data' => [
                'type' => 'sso',
                'attributes' => [
                    'url' => $this->resource['url']
                ],
            ]
        ];
    }
}
