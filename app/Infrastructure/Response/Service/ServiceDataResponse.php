<?php


namespace App\Infrastructure\Response\Service;


use App\Domain\Service\Service;
use Illuminate\Http\Resources\Json\Resource;

class ServiceDataResponse extends Resource
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
                'type' => 'service',
                'id' => $this->resource->getId(),
                'attributes' => [
                    'name' => $this->resource->getName()
                ]
            ]
        ];
    }

}
