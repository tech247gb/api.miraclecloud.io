<?php

namespace App\Domain\Account;


/**.
 * Class AccountFilter
 * @package App\Domain\AccountAdd
 */
class AccountFilter
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
     * @var integer|null
     */
    private $accountId;


    /**
     * @return string|null
     */
    public function getAccountName(): ?string
    {
        return $this->accountName;
    }

    /**
     * @param string|null $accountName
     * @return $this
     */
    public function setAccountName(?string $accountName): self
    {
        $this->accountName = $accountName;

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
     * @return $this
     */
    public function setStatusId(?int $statusId): self
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
     * @return $this
     */
    public function setBusinessUnitId(?int $businessUnitId): self
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
     * @return $this
     */
    public function setVendorId(?int $vendorId): self
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
     * @return $this
     */
    public function setSubBusinessUnitId(?int $subBusinessUnitId): self
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
     * @return $this
     */
    public function setEnrollmentId(?string $enrollmentId): self
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
     * @return $this
     */
    public function setAccountNumber(?string $accountNumber): self
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getARN(): ?string
    {
        return $this->aRN;
    }

    /**
     * @param string|null $aRN
     * @return $this
     */
    public function setARN(?string $aRN): self
    {
        $this->aRN = $aRN;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBucketName(): ?string
    {
        return $this->bucketName;
    }

    /**
     * @param string|null $bucketName
     * @return $this
     */
    public function setBucketName(?string $bucketName): self
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
     * @return $this
     */
    public function setTenant(?string $tenant): self
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
     * @return $this
     */
    public function setClientIdKey(?string $clientIdKey): self
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
     * @return $this
     */
    public function setClientSecret(?string $clientSecret): self
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
     * @return $this
     */
    public function setSubscriptionId(?string $subscriptionId): self
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
     * @return $this
     */
    public function setUsageDetailsPath(?string $usageDetailsPath): self
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
     * @return $this
     */
    public function setApiVersion(?string $apiVersion): self
    {
        $this->apiVersion = $apiVersion;

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
     * @return $this
     */
    public function setClientId(?int $clientId): self
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
     * @return $this
     */
    public function setAccountId(?int $accountId): self
    {
        $this->accountId = $accountId;

        return $this;
    }
}
