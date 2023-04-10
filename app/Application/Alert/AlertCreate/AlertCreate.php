<?php


namespace App\Application\Alert\AlertCreate;


use App\Application\Core\CommandBase;

class AlertCreate extends CommandBase
{

    /**
     * @var int
     */
    private $clientId;

    /**
     * @var string
     */
    private $alertName;

    /**
     * @var int
     */
    private $alertTypeId;

    /**
     * @var int
     */
    private $alertSourceId;

    /**
     * @var int|null
     */
    private $productId;

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
     * @var int
     */
    private $ownerId;

    /**
     * @var array|null
     */
    private $emailCC;

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->clientId;
    }

    /**
     * @param int $clientId
     * @return AlertCreate
     */
    public function setClientId(int $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * @return string
     */
    public function getAlertName(): string
    {
        return $this->alertName;
    }

    /**
     * @param string $alertName
     * @return AlertCreate
     */
    public function setAlertName(string $alertName): self
    {
        $this->alertName = $alertName;

        return $this;
    }

    /**
     * @return int
     */
    public function getAlertTypeId(): int
    {
        return $this->alertTypeId;
    }

    /**
     * @param int $alertTypeId
     * @return AlertCreate
     */
    public function setAlertTypeId(int $alertTypeId): self
    {
        $this->alertTypeId = $alertTypeId;

        return $this;
    }

    /**
     * @return int
     */
    public function getAlertSourceId(): int
    {
        return $this->alertSourceId;
    }

    /**
     * @param int $alertSourceId
     * @return AlertCreate
     */
    public function setAlertSourceId(int $alertSourceId): self
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
     * @return AlertCreate
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
     * @return AlertCreate
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
     * @return AlertCreate
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
     * @return AlertCreate
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
     * @return AlertCreate
     */
    public function setCondition(?string $condition): self
    {
        $this->condition = $condition;

        return $this;
    }

    /**
     * @return int
     */
    public function getOwnerId(): int
    {
        return $this->ownerId;
    }

    /**
     * @param int $ownerId
     * @return AlertCreate
     */
    public function setOwnerId(int $ownerId): self
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
     * @param array|null $emails
     * @return AlertCreate
     */
    public function setEmailCC(?array $emails): self
    {
        $this->emailCC = $emails;

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
     * @return AlertCreate
     */
    public function setProductId(?int $productId): self
    {
        $this->productId = $productId;

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
     * @return AlertCreate
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
     * @return AlertCreate
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
     * @return AlertCreate
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
     * @return AlertCreate
     */
    public function setWithinDay(?int $withinDay): self
    {
        $this->withinDay = $withinDay;

        return $this;
    }

    /**
     * @return bool
     */
    public function validateCommand(): bool
    {
        return true;
    }

}
