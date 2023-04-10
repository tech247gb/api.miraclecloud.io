<?php


namespace App\Domain\User;

use App\User as BaseUser;

/**
 * Class User
 * @package App\Domain\User
 *
 * @property int $id
 * @property string $name
 * @property int $type
 * @property int $status
 * @property string $createdAt
 * @property string $updatedAt
 * @property int $clientId
 */
class User extends BaseUser
{
    const
        STATUS_ACTIVE = 1,
        STATUS_DELETE = 0,

        TYPE_ADMIN = 2,
        TYPE_CLIENT = 1;

    public $id;
    public $name;
    public $type;
    public $status;
    public $createdAt;
    public $updatedAt;
    public $clientId;

    /**
     * @return array
     */
    public function mapAttr(): array
    {
        return array_merge(
            parent::mapAttr(),
            [
                'UserID' => 'id',
                'UserFullName' => 'name',
                'UseType' => 'type',
                'UserStatus' => 'status',
                'UserCreateDate' => 'createdAt',
                'UserUpdateDate' => 'updatedAt',
                'ClientID' => 'clientId',
                'lastExecutionStatus' => 'lastExecutionStatus',
            ]
        );
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function serPassword($password): string
    {
        $this->password = $password;
    }

    /**
     * @return User
     */
    public static function getModel()
    {
        return new self();
    }
}
