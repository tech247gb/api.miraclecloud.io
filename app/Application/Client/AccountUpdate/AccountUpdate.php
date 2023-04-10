<?php

namespace App\Application\Client\AccountUpdate;

use App\Contract\CommandBus\Client\AccountUpdateCommandInterface;
use App\Contract\CommandBus\CommandInterface;

/**
 * Class AccountUpdate
 * @package App\Application\Client\AccountUpdate
 */
class AccountUpdate implements AccountUpdateCommandInterface
{
    /**
     * @var string|null
     */
    private $accountName;

    /**
     * @var integer|null
     */
    private $clientId;
    /**
     * @var integer|null
     */
    private $accountId;
    /**
     * @var integer|null
     */
    private $statusId;
    /**
     * @var integer|null
     */
    private $businessUnitId;
    /**
     * @var integer|null
     */
    private $vendorId;
    /**
     * @var integer|null
     */
    private $subBusinessUnitId;
    /**
     * @var string|null
     */
    private $enrollmentId;
    /**
     * @var string|null
     */
    private $accountNumber;
    /**
     * @var string|null
     */
    private $aRN;
    /**
     * @var string|null
     */
    private $bucketName;
    /**
     * @var string|null
     */
    private $tenant;
    /**
     * @var string|null
     */
    private $clientIdKey;
    /**
     * @var string|null
     */
    private $clientSecret;
    /**
     * @var string|null
     */
    private $subscriptionId;
    /**
     * @var string|null
     */
    private $usageDetailsPath;
    /**
     * @var string|null
     */
    private $apiVersion;

    /**
     * @return int|null
     */
    public function getClientId(): ?int
    {
        return $this->clientId;
    }

    /**
     * @param int|null $clientId
     * @return AccountUpdateCommandInterface
     */
    public function setClientId(?int $clientId): AccountUpdateCommandInterface
    {
        $this->clientId = $clientId;

        return $this;
    }
    /**
     * @return int|null
     */
    public function getAccountId(): ?int
    {
        return $this->accountId;
    }

    /**
     * @param int|null $accountId
     * @return AccountUpdateCommandInterface
     */
    public function setAccountId(?int $accountId): AccountUpdateCommandInterface
    {
        $this->accountId = $accountId;

        return $this;
    }

    /**
     * @return self
     */
    public static function getCommand(): CommandInterface
    {
        return new self();

    }

    /**
     * @return string|null
     */
    public function getAccountName(): ?string
    {
        return $this->accountName;
    }

    /**
     * @param string|null $accountName
     * @return AccountUpdateCommandInterface
     */
    public function setAccountName(?string $accountName): AccountUpdateCommandInterface
    {
        $this->accountName = $accountName;

        return $this;
    }

    /**
     * @return int
     */
    public function getStatusId(): int
    {
        return $this->statusId;
    }

    /**
     * @param int|null $statusId
     * @return AccountUpdateCommandInterface
     */
    public function setStatusId(?int $statusId): AccountUpdateCommandInterface
    {
        $this->statusId = $statusId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getBusinessUnitId(): ?int
    {
        return $this->businessUnitId;
    }

    /**
     * @param int|null $businessUnitId
     * @return AccountUpdateCommandInterface
     */
    public function setBusinessUnitId(?int $businessUnitId): AccountUpdateCommandInterface
    {
        $this->businessUnitId = $businessUnitId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getVendorId(): ?int
    {
        return $this->vendorId;
    }

    /**
     * @param int|null $vendorId
     * @return AccountUpdateCommandInterface
     */
    public function setVendorId(?int $vendorId): AccountUpdateCommandInterface
    {
        $this->vendorId = $vendorId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSubBusinessUnitId(): ?int
    {
        return $this->subBusinessUnitId;
    }

    /**
     * @param int|null $subBusinessUnitId
     * @return AccountUpdateCommandInterface
     */
    public function setSubBusinessUnitId(?int $subBusinessUnitId): AccountUpdateCommandInterface
    {
        $this->subBusinessUnitId = $subBusinessUnitId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEnrollmentId(): ?string
    {
        return $this->enrollmentId;
    }

    /**
     * @param string|null $enrollmentId
     * @return AccountUpdateCommandInterface
     */
    public function setEnrollmentId(?string $enrollmentId): AccountUpdateCommandInterface
    {
        $this->enrollmentId = $enrollmentId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAccountNumber(): ?string
    {
        return $this->accountNumber;
    }

    /**
     * @param string|null $accountNumber
     * @return AccountUpdateCommandInterface
     */
    public function setAccountNumber(?string $accountNumber): AccountUpdateCommandInterface
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getARN(): ?string
    {
        return $this->aRN;
    }

    /**
     * @param string|null $aRN
     * @return AccountUpdateCommandInterface
     */
    public function setARN(?string $aRN): AccountUpdateCommandInterface
    {
        $this->aRN = $aRN;

        return $this;
    }

    /**
     * @return string
     */
    public function getBucketName(): ?string
    {
        return $this->bucketName;
    }

    /**
     * @param string|null $bucketName
     * @return AccountUpdateCommandInterface
     */
    public function setBucketName(?string $bucketName): AccountUpdateCommandInterface
    {
        $this->bucketName = $bucketName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTenant(): ?string
    {
        return $this->tenant;
    }

    /**
     * @param string|null $tenant
     * @return AccountUpdateCommandInterface
     */
    public function setTenant(?string $tenant): AccountUpdateCommandInterface
    {
        $this->tenant = $tenant;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getClientIdKey(): ?string
    {
        return $this->clientIdKey;
    }

    /**
     * @param string|null $clientIdKey
     * @return AccountUpdateCommandInterface
     */
    public function setClientIdKey(?string $clientIdKey): AccountUpdateCommandInterface
    {
        $this->clientIdKey = $clientIdKey;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getClientSecret(): ?string
    {
        return $this->clientSecret;
    }

    /**
     * @param string|null $clientSecret
     * @return AccountUpdateCommandInterface
     */
    public function setClientSecret(?string $clientSecret): AccountUpdateCommandInterface
    {
        $this->clientSecret = $clientSecret;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSubscriptionId(): ?string
    {
        return $this->subscriptionId;
    }

    /**
     * @param string|null $subscriptionId
     * @return AccountUpdateCommandInterface
     */
    public function setSubscriptionId(?string $subscriptionId): AccountUpdateCommandInterface
    {
        $this->subscriptionId = $subscriptionId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsageDetailsPath(): ?string
    {
        return $this->usageDetailsPath;
    }

    /**
     * @param string|null $usageDetailsPath
     * @return AccountUpdateCommandInterface
     */
    public function setUsageDetailsPath(?string $usageDetailsPath): AccountUpdateCommandInterface
    {
        $this->usageDetailsPath = $usageDetailsPath;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getApiVersion(): ?string
    {
        return $this->apiVersion;
    }

    /**
     * @param string|null $apiVersion
     * @return AccountUpdateCommandInterface
     */
    public function setApiVersion(?string $apiVersion): AccountUpdateCommandInterface
    {
        $this->apiVersion = $apiVersion;

        return $this;
    }
}
