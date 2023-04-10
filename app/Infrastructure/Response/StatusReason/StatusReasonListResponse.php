<?php

declare(strict_types = 1);

namespace App\Infrastructure\Response\StatusReason;


use App\Domain\StatusReason\StatusReason;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

/**
 * Class StatusReasonListResponse
 * @package App\Infrastructure\Response\StatusReason
 *
 * @property Collection $resource
 */
class StatusReasonListResponse extends JsonResource
{

    /**
     * @var Collection
     */
    public $resource;

    /**
     * @param Request $request
     * @return array|void
     */
    public function toArray($request)
    {
        return [

            'data' => $this->resource->map(function (StatusReason $statusReason) {

                return new StatusReasonResponse($statusReason);
            })
        ];
    }

}
