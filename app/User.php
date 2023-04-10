<?php

namespace App;

use App\Domain\BaseModel;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Laravel\Lumen\Auth\Authorizable;

/**
 * @property string $email
 * @property string $password
 *
 * Class User
 * @package App
 */
class User extends BaseModel implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    public $email;
    protected $password;

    /**
     * @return array
     */
    public function mapAttr(): array
    {
        return [
            'UserEmail' => 'email',
            'UserPassword' => 'password',
        ];
    }
}
