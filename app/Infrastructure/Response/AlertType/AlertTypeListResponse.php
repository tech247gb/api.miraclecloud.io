<?php


namespace App\Infrastructure\Response\AlertType;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class AlertTypeListResponse extends Resource
{

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->map(function ($alertType) {

            return new AlertTypeResponse($alertType);
        });
    }

}
