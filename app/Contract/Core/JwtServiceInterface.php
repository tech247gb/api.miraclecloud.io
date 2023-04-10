<?php

namespace App\Contract\Core;

use App\Domain\User\User;
use App\Http\Requests\LoginRequest;

/**
 * Interface JwtService
 * @package App\Contract\Core
 */
interface JwtServiceInterface
{
    /**
     * @param User $user
     * @param LoginRequest $request
     * @return array
     */
    public function generateTokenToUser(User $user, LoginRequest $request): array;

    /**
     * @param User $user
     * @return array
     */
    public function generateTokenToUserBySso(User $user): array;

    /**
     * @param string $token
     * @return User|null
     */
    public function authByToken(string $token): ?\stdClass;

    /**
     * @param string $token
     * @return \stdClass
     */
    public function decode(string $token): \stdClass;

    /**
     * @param string $token
     * @param string $key
     * @return \stdClass
     */
    public function decodeSsoToken(string $token, string $key): \stdClass;
}
