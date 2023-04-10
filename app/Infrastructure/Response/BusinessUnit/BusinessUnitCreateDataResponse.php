<?php


namespace App\Infrastructure\Response\BusinessUnit;


use App\Domain\BusinessUnit\BusinessUnit;
use Illuminate\Http\Resources\Json\Resource;

class BusinessUnitCreateDataResponse extends Resource
{

    /**
     * @var BusinessUnit
     */
    public $resource;

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type' => 'businessUnit',
            'id' => $this->resource->getId(),
            'attributes' => [
                'clientId' => $this->resource->getClientId(),
                'businessUnitName' => $this->resource->getBusinessUnitName(),
            ],
        ];
    }

}
