<?php

namespace App\Domain\AzureAccount;

use App\Domain\BaseModel;

class AzureAccountApp extends BaseModel
{
    public $accountId;

    public $accountNumber;

    public $accountName;

    public $assigned;

    public function mapAttr(): array
    {
        return [
            'AccountID' => 'accountId',
            'AccountNumber' => 'accountNumber',
            'AccountName' => 'accountName',
            'Assigned' => 'assigned',
        ];
    }
}
