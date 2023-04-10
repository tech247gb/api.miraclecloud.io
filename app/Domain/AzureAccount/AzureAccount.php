<?php

namespace App\Domain\AzureAccount;

use App\Domain\BaseModel;

class AzureAccount extends BaseModel
{
    public $id;

    public $tenant;

    public $clientIdKey;

    public $clientSecret;

    public $subscriptionId;

    public function mapAttr(): array
    {
        return [
            '_ClientID' => 'id',
            'Tenant' => 'tenant',
            'ClientIDKey' => 'clientIdKey',
            'ClientSecret' => 'clientSecret',
            'SubscriptionID' => 'subscriptionId',
        ];
    }
}
