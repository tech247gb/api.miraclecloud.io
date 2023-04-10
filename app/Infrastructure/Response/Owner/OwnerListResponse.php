<?php


namespace App\Infrastructure\Response\Owner;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class OwnerListResponse extends Resource
{

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {

        return $this->resource->map(function ($owner) {

            return new OwnerResponse($owner);
        });

    }

}
