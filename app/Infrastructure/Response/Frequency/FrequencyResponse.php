<?php


namespace App\Infrastructure\Response\Frequency;


use App\Domain\Frequency\Frequency;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class FrequencyResponse extends Resource
{

    /**
     * @var Frequency
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
                'type' => 'frequency',
                'attributes' => [
                    'id' => $this->resource->getId(),
                    'name' => $this->resource->getName()
                ]
            ]
        ];
    }

}
