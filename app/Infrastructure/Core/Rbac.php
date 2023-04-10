<?php

namespace App\Infrastructure\Core;

use App\Domain\User\User;
use App\Exceptions\ForbiddenExceptions;

/**
 * Class Sorting
 * @package App\Infrastructure\Core
 */
class Rbac
{
    /**
     * @param User $user
     * @throws ForbiddenExceptions
     */
    static function canClientList(User $user)
    {
        if ($user->type != User::TYPE_ADMIN) {

            throw new ForbiddenExceptions(40300);
        }
    }

    /**
     * @param User $user
     * @throws ForbiddenExceptions
     */
    static function canClientGet(User $user)
    {
        if ($user->type != User::TYPE_ADMIN) {

            throw new ForbiddenExceptions(40301);
        }
    }

    /**
     * @param User $user
     * @throws ForbiddenExceptions
     */
    static function canClientCreate(User $user)
    {
        if ($user->type != User::TYPE_ADMIN) {

            throw new ForbiddenExceptions(40302);
        }
    }

    /**
     * @param User $user
     * @throws ForbiddenExceptions
     */
    static function canClientUpdate(User $user)
    {
        if ($user->type != User::TYPE_ADMIN) {

            throw new ForbiddenExceptions(40303);
        }
    }

    /**
     * @param User $user
     * @throws ForbiddenExceptions
     */
    static function canClientDelete(User $user)
    {
        if ($user->type != User::TYPE_ADMIN) {

            throw new ForbiddenExceptions(40304);
        }
    }
    /**
     * @param User $user
     * @throws ForbiddenExceptions
     */
    static function canAccountControl(User $user)
    {
        if ($user->type != User::TYPE_ADMIN) {

            throw new ForbiddenExceptions(40304);
        }
    }
}
