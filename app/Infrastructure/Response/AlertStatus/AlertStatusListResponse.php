<?php

declare(strict_types = 1);

namespace App\Infrastructure\Response\AlertStatus;


use App\Domain\AlertStatus\AlertStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

/**
 * Class AlertStatusListResponse
 * @package App\Infrastructure\Response\AlertStatus
 *
 * @property Collection|null $resource
 */
class AlertStatusListResponse extends JsonResource
{
    /**
     * @var Collection|null
     */
    public $resource;

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'data' => $this->resource->map(function (AlertStatus $alertStatus) {

                return new AlertStatusResponse($alertStatus);
            })
        ];
    }
}
