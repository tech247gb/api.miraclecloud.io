<?php


namespace App\Infrastructure\Response\Vendor;


use App\Domain\Vendor\Vendor;
use Illuminate\Http\Resources\Json\Resource;

class VendorDataResponse extends Resource
{

    /**
     * @var Vendor
     */
    public $resource;

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'type' => 'vendor',
                'id' => $this->resource->getId(),
                'attributes' => [
                    'name' => $this->resource->getName()
                ]
            ]
        ];
    }

}
