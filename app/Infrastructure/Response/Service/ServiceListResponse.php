<?php


namespace App\Infrastructure\Response\Service;


use Illuminate\Http\Resources\Json\Resource;

class ServiceListResponse extends Resource
{

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [];

        foreach ($this->resource as $service) {

            $data[] = new ServiceDataResponse($service);

        }

        return [
            'data' => $data
        ];
    }

}
