<?php


namespace App\Infrastructure\Response\ComparisonType;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class ComparisonTypeListResponse extends Resource
{

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {

        return $this->resource->map(function ($comparisonType) {

            return new ComparisonTypeResponse($comparisonType);
        });

    }

}
