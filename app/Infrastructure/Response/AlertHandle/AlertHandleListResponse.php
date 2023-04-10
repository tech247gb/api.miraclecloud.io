<?php

declare(strict_types = 1);

namespace App\Infrastructure\Response\AlertHandle;


use App\Domain\AlertHandle\AlertHandle;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class AlertHandleListResponse
 * @package App\Infrastructure\Response\AlertHandle
 */
class AlertHandleListResponse extends JsonResource
{

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'data' => $this->resource->map(function (AlertHandle $alertHandle) {

                return new AlertHandleResponse($alertHandle);
            })
        ];

    }

}
