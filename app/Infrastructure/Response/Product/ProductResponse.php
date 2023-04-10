<?php


namespace App\Infrastructure\Response\Product;


use App\Domain\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class ProductResponse extends Resource
{

    /**
     * @var Product
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
                'type' => 'product',
                'attributes' => [
                    'id' => $this->resource->getId(),
                    'name' => $this->resource->getName()
                ]
            ]
        ];
    }

}
