<?php


namespace App\Infrastructure\Response\AlertType;


use App\Domain\AlertType\AlertType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class AlertTypeResponse extends Resource
{

    /**
     * @var AlertType
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
                'type' => 'alertType',
                'attributes' => [
                    'id' => $this->resource->getId(),
                    'name' => $this->resource->getName()
                ]
            ]
        ];
    }

}
