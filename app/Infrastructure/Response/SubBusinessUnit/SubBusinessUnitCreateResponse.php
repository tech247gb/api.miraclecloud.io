<?php


namespace App\Infrastructure\Response\SubBusinessUnit;


use App\Domain\SubBusinessUnit\SubBusinessUnit;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

/**
 * Class SubBusinessUnitCreateResponse
 * @package App\Infrastructure\Response\SubBusinessUnit
 */
class SubBusinessUnitCreateResponse extends Resource
{

    /**
     * @var SubBusinessUnit
     */
    public $resource;

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type' => 'subBusinessUnit',
            'id' => $this->resource->getId(),
            'attributes' => [
                'name' => $this->resource->getName(),
                'businessUnitId' => $this->resource->getBusinessUnitId(),
            ],
        ];
    }

}
