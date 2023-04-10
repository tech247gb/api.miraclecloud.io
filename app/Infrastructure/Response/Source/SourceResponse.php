<?php


namespace App\Infrastructure\Response\Source;


use App\Domain\Source\Source;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class SourceResponse extends Resource
{

    /**
     * @var Source
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
                'type' => 'source',
                'attributes' => [
                    'id' => $this->resource->getId(),
                    'alertSourceName' => $this->resource->getName()
                ]
            ]
        ];
    }
}
