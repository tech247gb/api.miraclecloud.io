<?php

namespace App\Domain\Client;

use App\Domain\BaseModel;

/**
 * @property int $id
 * @property string $name
 * @property string $joinDate
 * @property int $status
 *
 * Class Client
 * @package App\Domain\Client
 */
class Client extends BaseModel
{
    const
        STATUS_ACTIVE = 1,
        STATUS_DELETED = 0;

    public $id;
    public $name;
    public $joinDate;
    public $status;

    /**
     * @return array
     */
    public function mapAttr(): array
    {
        return [
            'ClientID' => 'id',
            'ClientName' => 'name',
            'JoiningDate' => 'joinDate',
            'Active' => 'status',
        ];
    }
}
