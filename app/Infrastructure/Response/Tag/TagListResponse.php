<?php


namespace App\Infrastructure\Response\Tag;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class TagListResponse extends Resource
{

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {

        return $this->resource->map(function ($tag) {

            return new TagResponse($tag);
        });
    }

}
