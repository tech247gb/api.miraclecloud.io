<?php


namespace App\Infrastructure\Response\Vendor;


use Illuminate\Http\Resources\Json\Resource;

class VendorListDataResponse extends Resource
{

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

        return [

            'data' => $this->resource->map(function ($vendor) {

                return new VendorDataResponse($vendor);
            })

        ];
    }

}
