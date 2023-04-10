<?php


namespace App\Infrastructure\Response\Alert;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class AlertListResponse extends Resource
{

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->map(function ($alert) {
            return new AlertResponse($alert);
        });
    }

}
