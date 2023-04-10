<?php

namespace App\Infrastructure\Response\User;

use Illuminate\Http\Resources\Json\Resource;

class LoginResource extends Resource
{

    public function toArray($request)
    {
        return [
            'data' => [
                'type' => 'user',
                'id' => $this->resource['user']->id,
                'attributes' => [
                    'UserID' => $this->resource['user']->id,
                    'ClientID' => $this->resource['user']->clientId,
                    'UserName' => $this->resource['user']->name,
                    'UserEmail' => $this->resource['user']->email,
                    'UserType' => $this->resource['user']->type,
                    'UserStatus' => $this->resource['user']->status,
                    'UserCreateDate' => $this->resource['user']->createdAt,
                    'UserUpdateDate' => $this->resource['user']->updatedAt,
                    'lastExecutionStatus' => $this->resource['user']->lastExecutionStatus,
                    'token' => [
                        'tokenType' => $this->resource['token']['tokenType'],
                        'expiresIn' => $this->resource['token']['expiresIn'],
                        'accessToken' => $this->resource['token']['accessToken'],
                    ]
                ],
            ]
        ];
    }
}
