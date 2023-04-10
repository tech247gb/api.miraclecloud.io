<?php


namespace App\Infrastructure\Response\Resource;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;
use App\Domain\Resource\Resource as ResourceModel;

class ResourceResponse extends Resource
{

    /**
     * @var ResourceModel
     */
    public $resource;

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'type' => 'resource',
                'attributes' => [
                    'id' => $this->resource->getId(),
                    'name' => $this->resource->getName()
                ]
            ]
        ];
    }

}
