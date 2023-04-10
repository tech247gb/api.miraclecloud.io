<?php


namespace App\Infrastructure\Response\Product;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class ProductListResponse extends Resource
{

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->map(function ($product) {
            return new ProductResponse($product);
        });
    }

}
