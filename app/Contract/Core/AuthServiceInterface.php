<?php
namespace App\Contract\Core;

use App\Domain\User\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface AuthServiceInterface
{
    /**
     * @param User $user
     * @param LoginRequest $request
     * @return array|null
     */
    public function login(User $user, LoginRequest $request): ?array;

    /**
     * @param Request $loginRequest
     * @return User|null
     */
    public function authByToken(Request $loginRequest): ?User;

    /**
     * @param string $reff
     * @param string $key
     * @return \stdClass|null
     */
    public function ssoAuthByToken(string $reff, string $key): ?\stdClass;

    /**
     * @param string $reff
     * @return string|null
     */
    public function getTokenByAzur(string $reff): ?array;

    /**
     * @param User $user
     * @return array
     */
    public function getTokenBySso(User $user): array;

    /**
     * @param string|null $client
     * @return Collection
     */
    public function getDestinationByClient(?string $client): Collection;
}
