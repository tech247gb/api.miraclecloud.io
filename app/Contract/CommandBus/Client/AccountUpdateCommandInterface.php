<?php

namespace App\Contract\CommandBus\Client;

use App\Contract\CommandBus\CommandInterface;

/**
 * Interface AccountUpdateCommandInterface
 * @package App\Contract\CommandBus\Client
 */
interface AccountUpdateCommandInterface extends CommandInterface
{

    /**
     * @return int
     */
    public function getClientId(): ?int;

    /**
     * @param int|null $clientId
     * @return $this
     */
    public function setClientId(?int $clientId): self;

    /**
     * @return int
     */
    public function getAccountId(): ?int;

    /**
     * @param int|null $accountId
     * @return $this
     */
    public function setAccountId(?int $accountId): self;

    /**
     * @param int|null $statusId
     * @return $this
     */
    public function setStatusId(?int $statusId): self;

    /**
     * @return CommandInterface
     */
    public static function getCommand(): CommandInterface;

    /**
     * @param int|null $subBusinessUnitId
     * @return $this
     */
    public function setSubBusinessUnitId(?int $subBusinessUnitId): self; /**

     * @param int|null $businessUnitId
     * @return $this
     */
    public function setBusinessUnitId(?int $businessUnitId): self;

    /**
     * @param string|null $enrollmentId
     * @return $this
     */
    public function setEnrollmentId(?string $enrollmentId): self;

    /**
     * @param string|null $accountNumber
     * @return $this
     */
    public function setAccountNumber(?string $accountNumber): self;

    /**
     * @param string|null $aRN
     * @return $this
     */
       public function setARN(?string $aRN): self;

    /**
     * @param string|null $bucketName
     * @return $this
     */
    public function setBucketName(?string $bucketName): self;

    /**
     * @param string|null $tenant
     * @return $this
     */
    public function setTenant(?string $tenant): self;

    /**
     * @param string|null $clientIdKey
     * @return $this
     */
    public function setClientIdKey(?string $clientIdKey): self;

    /**
     * @param string|null $clientSecret
     * @return $this
     */
    public function setClientSecret(?string $clientSecret): self;

    /**
     * @param string|null $subscriptionId
     * @return $this
     */
    public function setSubscriptionId(?string $subscriptionId): self;

    /**
     * @param string|null $usageDetailsPath
     * @return $this
     */
    public function setUsageDetailsPath(?string $usageDetailsPath): self;

    /**
     * @param string|null $apiVersion
     * @return $this
     */
    public function setApiVersion(?string $apiVersion): self;

    /**
     * @param string|null $apiVersion
     * @return $this
     */
    public function setAccountName(?string $apiVersion): self;

}
