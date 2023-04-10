<?php

declare(strict_types = 1);

namespace App\Domain\AlertHandle;


/**
 * Class AlertHandle
 * @package App\Domain\AlertHandle
 *
 * @property float|null $ranki
 * @property int|null $alertToHandleId
 * @property int|null $alertStatusId
 * @property int|null $reasonId
 * @property string|null $alertName
 * @property string|null $alertTypeName
 * @property string|null $alertSourceName
 * @property string|null $ownerName
 * @property string|null $emailCC
 * @property string|null $sendDate
 * @property string|null $statusName
 * @property string|null $reasonDescription
 * @property int|null $numberOfItems
 * @property string|null $numberOfPages
 * @property int|null $currentPage
 */
class AlertHandle
{

    /** @var int */
    public const STATUS_OPEN = 6;

    /** @var int */
    public const STATUS_CLOSED = 7;

    /** @var int */
    public const STATUS_REJECTED = 8;

    /** @var int */
    public const STATUS_HANDLED = 9;

    /**
     * @var float|null
     */
    private $ranki;

    /**
     * @var int|null
     */
    private $alertToHandleId;

    /**
     * @var string|null
     */
    private $alertName;

    /**
     * @var string|null
     */
    private $alertTypeName;

    /**
     * @var string|null
     */
    private $alertSourceName;

    /**
     * @var string|null
     */
    private $ownerName;

    /**
     * @var string|null
     */
    private $ownerEmail;

    /**
     * @var string|null
     */
    private $emailCC;

    /**
     * @var string|null
     */
    private $sendDate;

    /**
     * @var string|null
     */
    private $statusName;

    /**
     * @var string|null
     */
    private $reasonDescription;

    /**
     * @var int|null
     */
    private $reasonId;

    /**
     * @var int|null
     */
    private $alertStatusId;

    /**
     * @var int|null
     */
    private $numberOfItems;

    /**
     * @var string|null
     */
    private $numberOfPages;

    /**
     * @var int|null
     */
    private $currentPage;

    /**
     * @return int|null
     */
    public function getNumberOfItems(): ?int
    {
        return $this->numberOfItems;
    }

    /**
     * @param int|null $numberOfItems
     *
     * @return AlertHandle
     */
    public function setNumberOfItems(?int $numberOfItems): self
    {
        $this->numberOfItems = $numberOfItems;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNumberOfPages(): ?string
    {
        return $this->numberOfPages;
    }

    /**
     * @param string|null $numberOfPages
     *
     * @return AlertHandle
     */
    public function setNumberOfPages(?string $numberOfPages): self
    {
        $this->numberOfPages = $numberOfPages;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCurrentPage(): ?int
    {
        return $this->currentPage;
    }

    /**
     * @param int|null $currentPage
     * @return AlertHandle
     */
    public function setCurrentPage(?int $currentPage): self
    {
        $this->currentPage = $currentPage;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getReasonId(): ?int
    {
        return $this->reasonId;
    }

    /**
     * @param int|null $reasonId
     *
     * @return AlertHandle
     */
    public function setReasonId(?int $reasonId): self
    {
        $this->reasonId = $reasonId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getAlertStatusId(): ?int
    {
        return $this->alertStatusId;
    }

    /**
     * @param int|null $alertStatusId
     *
     * @return AlertHandle
     */
    public function setAlertStatusId(?int $alertStatusId): self
    {
        $this->alertStatusId = $alertStatusId;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getRanki(): ?float
    {
        return $this->ranki;
    }

    /**
     * @param float|null $ranki
     *
     * @return AlertHandle
     */
    public function setRanki(?float $ranki): self
    {
        $this->ranki = $ranki;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getAlertToHandleId(): ?int
    {
        return $this->alertToHandleId;
    }

    /**
     * @param int|null $alertToHandleId
     * @return AlertHandle
     */
    public function setAlertToHandleId(?int $alertToHandleId): self
    {
        $this->alertToHandleId = $alertToHandleId;

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
     *
     * @return AlertHandle
     */
    public function setAlertName(?string $alertName): self
    {
        $this->alertName = $alertName;

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
     *
     * @return AlertHandle
     */
    public function setAlertTypeName(?string $alertTypeName): self
    {
        $this->alertTypeName = $alertTypeName;

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
     *
     * @return AlertHandle
     */
    public function setAlertSourceName(?string $alertSourceName): self
    {
        $this->alertSourceName = $alertSourceName;

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
     *
     * @return AlertHandle
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
     *
     * @return AlertHandle
     */
    public function setOwnerEmail(?string $ownerEmail): self
    {
        $this->ownerEmail = $ownerEmail;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmailCC(): ?string
    {
        return $this->emailCC;
    }

    /**
     * @param string|null $emailCC
     *
     * @return AlertHandle
     */
    public function setEmailCC(?string $emailCC): self
    {
        $this->emailCC = $emailCC;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSendDate(): ?string
    {
        return $this->sendDate;
    }

    /**
     * @param string|null $sendDate
     *
     * @return AlertHandle
     */
    public function setSendDate(?string $sendDate): self
    {
        $this->sendDate = $sendDate;

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
     *
     * @return AlertHandle
     */
    public function setStatusName(?string $statusName): self
    {
        $this->statusName = $statusName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getReasonDescription(): ?string
    {
        return $this->reasonDescription;
    }

    /**
     * @param string|null $reasonDescription
     *
     * @return AlertHandle
     */
    public function setReasonDescription(?string $reasonDescription): self
    {
        $this->reasonDescription = $reasonDescription;

        return $this;
    }

}
