<?php


namespace App\Infrastructure\Response\ComparisonType;


use App\Domain\ComparisonType\ComparisonType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class ComparisonTypeResponse extends Resource
{

    /**
     * @var ComparisonType
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
                'type' => 'comparisonType',
                'attributes' => [
                    'id' => $this->resource->getId(),
                    'name' => $this->resource->getName()
                ]
            ]
        ];
    }

}
