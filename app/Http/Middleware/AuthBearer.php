<?php


namespace App\Http\Middleware;

use App\Contract\Core\AuthServiceInterface;
use App\Domain\User\User;
use App\Exceptions\UnauthorizedException;
use Closure;
use Laravel\Lumen\Http\Request;

/**
 * Class AuthDashboard
 * @package App\Http\Middleware
 */
class AuthBearer
{
    /** @var AuthServiceInterface $authService */
    protected $authService;

    /**
     * AuthDashboard constructor.
     * @param AuthServiceInterface $authService
     */
    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @param Request $request
     * @param Closure $next
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory|mixed
     * @throws UnauthorizedException
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$token = $request->header('Authorization')) {

            throw new UnauthorizedException(4010, "Header not provided", 401);
        }

        try {
            $request->user = $this->authService->authByToken($request);
        } catch (UnauthorizedException $exception) {

            throw $exception;
        } catch (\Exception $exception) {

            throw new UnauthorizedException(4012, "Token not provided", 401);
        }

        if (!$request->user) {

            throw new UnauthorizedException(4013, "Token not provided", 401);
        }

        if ($request->user->status != User::STATUS_ACTIVE) {

            throw new UnauthorizedException(4019, "User not active", 401);
        }

        return $next($request);
    }
}
