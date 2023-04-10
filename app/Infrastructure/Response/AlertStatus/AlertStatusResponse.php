<?php

declare(strict_types = 1);

namespace App\Infrastructure\Response\AlertStatus;


use App\Domain\AlertStatus\AlertStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class AlertStatusResponse
 * @package App\Infrastructure\Response\AlertStatus
 *
 * @property AlertStatus $resource
 */
class AlertStatusResponse extends JsonResource
{

    /**
     * @var AlertStatus
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
                'type' => 'alertStatus',
                'attributes' => [
                    'alertStatusId' => $this->resource->getAlertStatusId(),
                    'statusName' => $this->resource->getStatusName()
                ]
            ]
        ];
    }

}
