<?php


namespace App\Infrastructure\Response\Frequency;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class FrequencyListResponse extends Resource
{

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->map(function ($frequency) {

            return new FrequencyResponse($frequency);
        });
    }

}
