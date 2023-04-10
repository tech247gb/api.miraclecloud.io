<?php

namespace App\Infrastructure\Response\Client;

use Illuminate\Http\Resources\Json\Resource;

class AccountDataResponse extends Resource
{
    /**
     * @var bool for don't sanitize int keys
     */
    public $preserveKeys = true;

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type' => 'account',
            'id' => $this->resource->AccountID,
            'attributes' => [
                'accountID' => $this->resource->AccountID,
                'accountNumber' => $this->resource->AccountNumber,
                'accountName' => $this->resource->AccountName,
                'expirationDate' => $this->resource->ExpirationDate,
                'creationDate' => $this->resource->CreationDate,
                'clientID' => $this->resource->ClientID,
                'vendorID' => $this->resource->VendorID,
                'subBusinessUnitID' => $this->resource->SubBusinessUnitID,
                'enrollmentID' => $this->resource->EnrollmentID,
                'statusID' => $this->resource->StatusID,
                'clientSecret' => $this->resource->ClientSecret,
                'tenant' => $this->resource->Tenant,
                'businessUnitID' => $this->resource->BusinessUnitID,
                'bucketName' => $this->resource->BucketName,
                'apiVersion' => $this->resource->ApiVersion,
                'lastCostDate' => $this->resource->LastCostDate,
                'clientIdKey' => $this->resource->ClientIDKey,
                'aRN' => $this->resource->ARN,
                'subscriptionID' => $this->resource->SubscriptionID,
                'usageDetailsPath' => $this->resource->UsageDetailsPath,
                'finance' => $this->resource->Finance,
                'api' => $this->resource->Api,
            ],
        ];
    }
}
