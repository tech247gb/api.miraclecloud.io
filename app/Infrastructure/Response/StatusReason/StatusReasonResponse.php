<?php

declare(strict_types = 1);

namespace App\Infrastructure\Response\StatusReason;


use App\Domain\StatusReason\StatusReason;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class StatusReasonResponse
 * @package App\Infrastructure\Response\StatusReason
 *
 * @property StatusReason $resource
 */
class StatusReasonResponse extends JsonResource
{

    /**
     * @var StatusReason
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
                'type' => 'statusReason',
                'attributes' => [
                    'reasonId' => $this->resource->getReasonId(),
                    'reasonDescription' => $this->resource->getReasonDescription()
                ]
            ]
        ];
    }

}
