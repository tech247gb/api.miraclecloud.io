<?php


namespace App\Infrastructure\Response\Alert;


use App\Domain\Alert\Alert;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class AlertResponse extends Resource
{

    /**
     * @var Alert
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
                'type' => 'alert',
                'attributes' => [
                    'id' => $this->resource->getId(),
                    'alertName' => $this->resource->getAlertName(),
                    'alertTypeId' => $this->resource->getAlertTypeId(),
                    'alertTypeName' => $this->resource->getAlertTypeName(),
                    'alertTypeDescription' => $this->resource->getAlertTypeDescription(),
                    'alertSourceId' => $this->resource->getAlertSourceId(),
                    'alertSourceName' => $this->resource->getAlertSourceName(),
                    'productId' => $this->resource->getProductId(),
                    'productName' => $this->resource->getProductName(),
                    'entityTypeId' => $this->resource->getEntityTypeId(),
                    'entityTypeName' => $this->resource->getEntityTypeName(),
                    'entityName' => $this->resource->getEntityName(),
                    'tagKey' => $this->resource->getTagKey(),
                    'tagValue' => $this->resource->getTagValue(),
                    'comparisonTypeId' => $this->resource->getComparisonTypeID(),
                    'comparisonName' => $this->resource->getComparisonName(),
                    'percentageOfComparison' => $this->resource->getPercentageOfComparison(),
                    'withinMonth' => $this->resource->getWithinMonth(),
                    'withinDay' => $this->resource->getWithinDay(),
                    'ownerID' => $this->resource->getOwnerID(),
                    'ownerName' => $this->resource->getOwnerName(),
                    'ownerEmail' => $this->resource->getOwnerEmail(),
                    'emailCC' => $this->resource->getEmailCC(),
                    'condition' => $this->resource->getCondition(),
                    'creationDate' => $this->resource->getCreationDate(),
                    'statusId' => $this->resource->getStatusId(),
                    'statusName' => $this->resource->getStatusName(),
                    'entityId' => $this->resource->getEntityId()
                ]
            ]
        ];
    }


}
