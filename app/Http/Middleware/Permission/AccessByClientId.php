<?php

namespace App\Http\Middleware\Permission;

use Closure;
use App\Domain\User\User;
use Laravel\Lumen\Http\Request;
use App\Exceptions\UnprocessableExceptions;

class AccessByClientId
{
    /**
     * @throws UnprocessableExceptions
     *
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory|mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = null;
        $clientId = (int) $request->route('clientId');
        if (isset($request->user)) {
            $user = $request->user;
        }

        if (
            $clientId &&
            $user instanceof User &&
            $clientId === $user->clientId
        ) {
            return $next($request);
        }

        throw new UnprocessableExceptions(5003);
    }
}
