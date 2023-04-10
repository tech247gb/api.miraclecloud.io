<?php


namespace App\Infrastructure\Response\Alert;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Collection;

class AlertTypeDescriptionListResponse extends Resource
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
            'data' => $this->resource->map(function ($alertTypeDescription) {

                return [
                    'type' => 'alertTypeDescription',
                    'attributes' => [
                        'id' => $alertTypeDescription->AlertTypeID,
                        'alertTypeName' => $alertTypeDescription->AlertTypeName,
                        'alertTypeDescription' => $alertTypeDescription->AlertTypeDescritpion
                    ]
                ];

            })
        ];
    }

}
