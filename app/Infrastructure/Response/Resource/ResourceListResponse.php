<?php


namespace App\Infrastructure\Response\Resource;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class ResourceListResponse extends Resource
{

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {

        return $this->resource->map(function ($source) {

            return new ResourceResponse($source);
        });
    }

}
