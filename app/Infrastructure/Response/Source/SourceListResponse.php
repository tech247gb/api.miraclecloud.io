<?php


namespace App\Infrastructure\Response\Source;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class SourceListResponse extends Resource
{

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->map(function ($source) {

            return new SourceResponse($source);
        });
    }
}
