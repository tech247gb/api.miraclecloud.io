<?php

declare(strict_types = 1);

namespace App\Infrastructure\Response\AlertHandle;


use App\Domain\AlertHandle\AlertHandle;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class AlertHandleResponse
 * @package App\Infrastructure\Response\AlertHandle
 *
 * @property AlertHandle $resource
 */
class AlertHandleResponse extends JsonResource
{

    /**
     * @var AlertHandle
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
                'type' => 'alertHandle',
                'attributes' => [
                    'ranki' => $this->resource->getRanki(),
                    'alertToHandleId' => $this->resource->getAlertToHandleId(),
                    'alertName' => $this->resource->getAlertName(),
                    'alertTypeName' => $this->resource->getAlertTypeName(),
                    'alertSourceName' => $this->resource->getAlertSourceName(),
                    'ownerName' => $this->resource->getOwnerName(),
                    'ownerEmail' => $this->resource->getOwnerEmail(),
                    'emailCC' => $this->resource->getEmailCC(),
                    'sendDate' => $this->resource->getSendDate(),
                    'statusName' => $this->resource->getStatusName(),
                    'reasonDescription' => $this->resource->getReasonDescription(),
                    'alertStatusId' => $this->resource->getAlertStatusId(),
                    'reasonId' => $this->resource->getReasonId(),
                    'numberOfItems' => $this->resource->getNumberOfItems(),
                    'numberOfPages' => $this->resource->getNumberOfPages(),
                    'currentPage' => $this->resource->getCurrentPage()
                ]
            ]
        ];
    }

}
