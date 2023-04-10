<?php


namespace App\Domain\Alert;


class AlertFilter
{

    /**
     * @var int|null
     */
    private $alertId;

    /**
     * @var int|null
     */
    private $clientId;

    /**
     * @var string|null
     */
    private $alertName;

    /**
     * @var int|null
     */
    private $alertTypeId;

    /**
     * @var int|null
     */
    private $alertSourceId;

    /**
     * @var int|null
     */
    private $entityTypeId;

    /**
     * @var int|null
     */
    private $entityId;

    /**
     * @var int|null
     */
    private $comparisonTypeId;

    /**
     * @var int|null
     */
    private $percentageOfComparison;

    /**
     * @var string|null
     */
    private $condition;

    /**
     * @var int|null
     */
    private $ownerId;

    /**
     * @var array|null
     */
    private $emailCC;

    /**
     * @var int|null
     */
    private $productId;

    /**
     * @var array|null
     */
    private $alertIds;

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
    private $withinMonth;

    /**
     * @var int|null
     */
    private $withinDay;

    /**
     * @return int|null
     */
    public function getAlertId(): ?int
    {
        return $this->alertId;
    }

    /**
     * @param int|null $alertId
     * @return AlertFilter
     */
    public function setAlertId(?int $alertId): self
    {
        $this->alertId = $alertId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getClientId(): ?int
    {
        return $this->clientId;
    }

    /**
     * @param int|null $clientId
     * @return AlertFilter
     */
    public function setClientId(?int $clientId): self
    {
        $this->clientId = $clientId;

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
     * @return AlertFilter
     */
    public function setAlertName(?string $alertName): self
    {
        $this->alertName = $alertName;

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
     * @return AlertFilter
     */
    public function setAlertTypeId(?int $alertTypeId): self
    {
        $this->alertTypeId = $alertTypeId;

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
     * @return AlertFilter
     */
    public function setAlertSourceId(?int $alertSourceId): self
    {
        $this->alertSourceId = $alertSourceId;

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
     * @return AlertFilter
     */
    public function setEntityTypeId(?int $entityTypeId): self
    {
        $this->entityTypeId = $entityTypeId;

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
     * @return AlertFilter
     */
    public function setEntityId(?int $entityId): self
    {
        $this->entityId = $entityId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getComparisonTypeId(): ?int
    {
        return $this->comparisonTypeId;
    }

    /**
     * @param int|null $comparisonTypeId
     * @return AlertFilter
     */
    public function setComparisonTypeId(?int $comparisonTypeId): self
    {
        $this->comparisonTypeId = $comparisonTypeId;

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
     * @return AlertFilter
     */
    public function setPercentageOfComparison(?int $percentageOfComparison): self
    {
        $this->percentageOfComparison = $percentageOfComparison;

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
     * @return AlertFilter
     */
    public function setCondition(?string $condition): self
    {
        $this->condition = $condition;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getOwnerId(): ?int
    {
        return $this->ownerId;
    }

    /**
     * @param int|null $ownerId
     * @return AlertFilter
     */
    public function setOwnerId(?int $ownerId): self
    {
        $this->ownerId = $ownerId;

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
     * @return AlertFilter
     */
    public function setEmailCC(?array $emailCC): self
    {
        $this->emailCC = $emailCC;

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
     * @return AlertFilter
     */
    public function setProductId(?int $productId): self
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getAlertIds(): ?array
    {
        return $this->alertIds;
    }

    /**
     * @param array|null $alertIds
     * @return AlertFilter
     */
    public function setAlertIds(?array $alertIds): self
    {
        $this->alertIds = $alertIds;

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
     * @return AlertFilter
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
     * @return AlertFilter
     */
    public function setTagValue(?string $tagValue): self
    {
        $this->tagValue = $tagValue;

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
     * @return AlertFilter
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
     * @return AlertFilter
     */
    public function setWithinDay(?int $withinDay): self
    {
        $this->withinDay = $withinDay;

        return $this;
    }

}
