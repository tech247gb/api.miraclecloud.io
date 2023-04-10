<?php


namespace App\Infrastructure\Response\Alert;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Collection;

class AlertServiceListResponse extends Resource
{

    /**
     * @var Collection
     */
    public $resource;

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'data' => $this->resource->map(function ($alertService) {

                return [
                    'type' => 'alertService',
                    'attributes' => [
                        'entityTypeId' => $alertService->EntityTypeID,
                        'entityTypeName' => $alertService->EntityTypeName
                    ]
                ];
            })
        ];
    }

}
