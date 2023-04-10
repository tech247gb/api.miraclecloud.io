<?php

namespace App\Application\Client\AccountAdd;

use App\Contract\CommandBus\Client\AccountAddCommandInterface;
use App\Contract\CommandBus\Client\AccountCommandInterface;
use App\Contract\CommandBus\CommandInterface;

/**
 * Class AccountAdd
 * @package App\Application\Client\AccountAdd
 */
class AccountAdd implements AccountAddCommandInterface
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
     * @return AccountCommandInterface
     */
    public function setClientId(?int $clientId): AccountAddCommandInterface
    {
        $this->clientId = $clientId;

        return $this;
    }
    /**
     * @return int|null
     */
    public function getAccountId(): ?int
    {
        return $this->clientId;
    }

    /**
     * @param int|null $accountId
     * @return AccountCommandInterface
     */
    public function setAccountId(?int $accountId): AccountAddCommandInterface
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
     * @return AccountCommandInterface
     */
    public function setAccountName(?string $accountName): AccountAddCommandInterface
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
     * @return AccountCommandInterface
     */
    public function setStatusId(?int $statusId): AccountAddCommandInterface
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
     * @return AccountCommandInterface
     */
    public function setBusinessUnitId(?int $businessUnitId): AccountAddCommandInterface
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
     * @return AccountCommandInterface
     */
    public function setVendorId(?int $vendorId): AccountAddCommandInterface
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
     * @return AccountCommandInterface
     */
    public function setSubBusinessUnitId(?int $subBusinessUnitId): AccountAddCommandInterface
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
     * @return AccountCommandInterface
     */
    public function setEnrollmentId(?string $enrollmentId): AccountAddCommandInterface
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
     * @return AccountCommandInterface
     */
    public function setAccountNumber(?string $accountNumber): AccountAddCommandInterface
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
     * @return AccountCommandInterface
     */
    public function setARN(?string $aRN): AccountAddCommandInterface
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
     * @return AccountCommandInterface
     */
    public function setBucketName(?string $bucketName): AccountAddCommandInterface
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
     * @return AccountCommandInterface
     */
    public function setTenant(?string $tenant): AccountAddCommandInterface
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
     * @return AccountCommandInterface
     */
    public function setClientIdKey(?string $clientIdKey): AccountAddCommandInterface
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
     * @return AccountCommandInterface
     */
    public function setClientSecret(?string $clientSecret): AccountAddCommandInterface
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
     * @return AccountCommandInterface
     */
    public function setSubscriptionId(?string $subscriptionId): AccountAddCommandInterface
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
     * @return AccountCommandInterface
     */
    public function setUsageDetailsPath(?string $usageDetailsPath): AccountAddCommandInterface
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
     * @return AccountCommandInterface
     */
    public function setApiVersion(?string $apiVersion): AccountAddCommandInterface
    {
        $this->apiVersion = $apiVersion;

        return $this;
    }
}
