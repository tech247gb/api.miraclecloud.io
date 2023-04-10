<?php


namespace App\Domain\Alert;


class Alert
{

    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $alertName;

    /**
     * @var int|null
     */
    private $alertTypeId;

    /**
     * @var string|null
     */
    private $alertTypeName;

    /**
     * @var int|null
     */
    private $alertSourceId;

    /**
     * @var string|null
     */
    private $alertTypeDescription;

    /**
     * @var int|null
     */
    private $productId;

    /**
     * @var string|null
     */
    private $productName;

    /**
     * @var int|null
     */
    private $entityTypeId;

    /**
     * @var string|null
     */
    private $tagKey;

    /**
     * @var string|null
     */
    private $tagValue;

    /**
     * @var int|null
     */
    private $comparisonTypeID;

    /**
     * @var int|null
     */
    private $withinMonth;

    /**
     * @var int|null
     */
    private $withinDay;

    /**
     * @var int|null
     */
    private $ownerID;

    /**
     * @var string|null
     */
    private $alertSourceName;

    /**
     * @var string|null
     */
    private $entityTypeName;

    /**
     * @var string|null
     */
    private $entityName;

    /**
     * @var string|null
     */
    private $comparisonName;

    /**
     * @var int|null
     */
    private $percentageOfComparison;

    /**
     * @var string|null
     */
    private $ownerName;

    /**
     * @var string|null
     */
    private $ownerEmail;

    /**
     * @var array|null
     */
    private $emailCC;

    /**
     * @var string|null
     */
    private $condition;

    /**
     * @var string|null
     */
    private $creationDate;

    /**
     * @var int|null
     */
    private $statusId;

    /**
     * @var string|null
     */
    private $statusName;

    /**
     * @var int|null
     */
    private $entityId;

    /**
     * @var array
     */
    public static $exportExcelHeaders = [
        'Alert Name',
        'Alert Type',
        'Alert Source',
        'Owner',
        'Owner Email',
        'Condition',
        'Creation Date',
        'Status'
    ];

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Alert
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAlertName(): ?string
    {
        return $this->alertName;
    }

    /**
     * @param string|null $alertName
     * @return Alert
     */
    public function setAlertName(?string $alertName): self
    {
        $this->alertName = $alertName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAlertTypeDescription(): ?string
    {
        return $this->alertTypeDescription;
    }

    /**
     * @param string|null $alertTypeDescription
     * @return Alert
     */
    public function setAlertTypeDescription(?string $alertTypeDescription): self
    {
        $this->alertTypeDescription = $alertTypeDescription;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEntityTypeName(): ?string
    {
        return $this->entityTypeName;
    }

    /**
     * @param string|null $entityTypeName
     * @return Alert
     */
    public function setEntityTypeName(?string $entityTypeName): self
    {
        $this->entityTypeName = $entityTypeName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEntityName(): ?string
    {
        return $this->entityName;
    }

    /**
     * @param string|null $entityName
     * @return Alert
     */
    public function setEntityName(?string $entityName): self
    {
        $this->entityName = $entityName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getComparisonName(): ?string
    {
        return $this->comparisonName;
    }

    /**
     * @param string|null $comparisonName
     * @return Alert
     */
    public function setComparisonName(?string $comparisonName): self
    {
        $this->comparisonName = $comparisonName;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPercentageOfComparison(): ?int
    {
        return $this->percentageOfComparison;
    }

    /**
     * @param int|null $percentageOfComparison
     * @return Alert
     */
    public function setPercentageOfComparison(?int $percentageOfComparison): self
    {
        $this->percentageOfComparison = $percentageOfComparison;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOwnerName(): ?string
    {
        return $this->ownerName;
    }

    /**
     * @param string|null $ownerName
     * @return Alert
     */
    public function setOwnerName(?string $ownerName): self
    {
        $this->ownerName = $ownerName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOwnerEmail(): ?string
    {
        return $this->ownerEmail;
    }

    /**
     * @param string|null $ownerEmail
     * @return Alert
     */
    public function setOwnerEmail(?string $ownerEmail): self
    {
        $this->ownerEmail = $ownerEmail;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getEmailCC(): ?array
    {
        return $this->emailCC;
    }

    /**
     * @param array|null $emailCC
     * @return Alert
     */
    public function setEmailCC(?array $emailCC): self
    {
        $this->emailCC = $emailCC;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCondition(): ?string
    {
        return $this->condition;
    }

    /**
     * @param string|null $condition
     * @return Alert
     */
    public function setCondition(?string $condition): self
    {
        $this->condition = $condition;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCreationDate(): ?string
    {
        return $this->creationDate;
    }

    /**
     * @param string|null $creationDate
     * @return Alert
     */
    public function setCreationDate(?string $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStatusName(): ?string
    {
        return $this->statusName;
    }

    /**
     * @param string|null $statusName
     * @return Alert
     */
    public function setStatusName(?string $statusName): self
    {
        $this->statusName = $statusName;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getAlertTypeId(): ?int
    {
        return $this->alertTypeId;
    }

    /**
     * @param int|null $alertTypeId
     * @return Alert
     */
    public function setAlertTypeId(?int $alertTypeId): self
    {
        $this->alertTypeId = $alertTypeId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAlertTypeName(): ?string
    {
        return $this->alertTypeName;
    }

    /**
     * @param string|null $alertTypeName
     * @return Alert
     */
    public function setAlertTypeName(?string $alertTypeName): self
    {
        $this->alertTypeName = $alertTypeName;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getAlertSourceId(): ?int
    {
        return $this->alertSourceId;
    }

    /**
     * @param int|null $alertSourceId
     * @return Alert
     */
    public function setAlertSourceId(?int $alertSourceId): self
    {
        $this->alertSourceId = $alertSourceId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getProductId(): ?int
    {
        return $this->productId;
    }

    /**
     * @param int|null $productId
     * @return Alert
     */
    public function setProductId(?int $productId): self
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getProductName(): ?string
    {
        return $this->productName;
    }

    /**
     * @param string|null $productName
     * @return Alert
     */
    public function setProductName(?string $productName): self
    {
        $this->productName = $productName;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getEntityTypeId(): ?int
    {
        return $this->entityTypeId;
    }

    /**
     * @param int|null $entityTypeId
     * @return Alert
     */
    public function setEntityTypeId(?int $entityTypeId): self
    {
        $this->entityTypeId = $entityTypeId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTagKey(): ?string
    {
        return $this->tagKey;
    }

    /**
     * @param string|null $tagKey
     * @return Alert
     */
    public function setTagKey(?string $tagKey): self
    {
        $this->tagKey = $tagKey;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTagValue(): ?string
    {
        return $this->tagValue;
    }

    /**
     * @param string|null $tagValue
     * @return Alert
     */
    public function setTagValue(?string $tagValue): self
    {
        $this->tagValue = $tagValue;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getComparisonTypeID(): ?int
    {
        return $this->comparisonTypeID;
    }

    /**
     * @param int|null $comparisonTypeID
     * @return Alert
     */
    public function setComparisonTypeID(?int $comparisonTypeID): self
    {
        $this->comparisonTypeID = $comparisonTypeID;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getWithinMonth(): ?int
    {
        return $this->withinMonth;
    }

    /**
     * @param int|null $withinMonth
     * @return Alert
     */
    public function setWithinMonth(?int $withinMonth): self
    {
        $this->withinMonth = $withinMonth;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getWithinDay(): ?int
    {
        return $this->withinDay;
    }

    /**
     * @param int|null $withinDay
     * @return Alert
     */
    public function setWithinDay(?int $withinDay): self
    {
        $this->withinDay = $withinDay;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getOwnerID(): ?int
    {
        return $this->ownerID;
    }

    /**
     * @param int|null $ownerID
     * @return Alert
     */
    public function setOwnerID(?int $ownerID): self
    {
        $this->ownerID = $ownerID;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAlertSourceName(): ?string
    {
        return $this->alertSourceName;
    }

    /**
     * @param string|null $alertSourceName
     * @return Alert
     */
    public function setAlertSourceName(?string $alertSourceName): self
    {
        $this->alertSourceName = $alertSourceName;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getStatusId(): ?int
    {
        return $this->statusId;
    }

    /**
     * @param int|null $statusId
     * @return Alert
     */
    public function setStatusId(?int $statusId): self
    {
        $this->statusId = $statusId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getEntityId(): ?int
    {
        return $this->entityId;
    }

    /**
     * @param int|null $entityId
     * @return Alert
     */
    public function setEntityId(?int $entityId): self
    {
        $this->entityId = $entityId;

        return $this;
    }

}
