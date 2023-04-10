<?php


namespace App\Infrastructure\Response\Owner;


use App\Domain\Owner\Owner;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class OwnerResponse extends Resource
{

    /**
     * @var Owner
     */
    public $resource;

    /**
     * @param Request $request
     * @return array|void
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'type' => 'owner',
                'attributes' => [
                    'id' => $this->resource->getId(),
                    'fullName' => $this->resource->getFullName(),
                    'email' => $this->resource->getEmail()
                ]
            ]
        ];
    }

}
