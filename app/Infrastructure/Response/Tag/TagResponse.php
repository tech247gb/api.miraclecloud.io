<?php


namespace App\Infrastructure\Response\Tag;


use App\Domain\Tag\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class TagResponse extends Resource
{

    /**
     * @var Tag
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
                'type' => 'tag',
                'attributes' => [
                    'id' => $this->resource->getId(),
                    'key' => $this->resource->getKey(),
                    'value' => $this->resource->getValue()
                ]
            ]
        ];
    }

}
