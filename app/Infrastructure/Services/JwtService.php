<?php

namespace App\Infrastructure\Services;

use App\Contract\Core\JwtServiceInterface;
use App\Domain\User\User;
use App\Exceptions\UnauthorizedException;
use App\Http\Requests\LoginRequest;
use Carbon\Carbon;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use stdClass;

/**
 * Class JwtService
 * @package App\Infrastructure\Services
 */
class JwtService implements JwtServiceInterface
{
    /** @var string $key */
    protected $key;

    /** @var int $lifetime (minutes) */
    protected $lifetime;

    private $algo = 'HS256';

    /**
     * JwtService constructor.
     */
    public function __construct()
    {
        $this->key = env('APP_KEY');
        $this->lifetime = env('TOKEN_LIFETIME');
    }

    /**
     * @param string $token
     * @return stdClass
     */
    public function decode(string $token): stdClass
    {

        return JWT::decode($token, $this->key, [$this->algo]);
    }

    /**
     * @param string $token
     * @param string $key
     * @return stdClass
     */
    public function decodeSsoToken(string $token, string $key): stdClass
    {

        return JWT::decode($token, $key, [$this->algo]);
    }

    /**
     * @param User $user
     * @param LoginRequest $request
     * @return array
     */
    public function generateTokenToUser(User $user, LoginRequest $request): array
    {
        $exp = Carbon::now()->addSeconds($this->lifetime)->timestamp;

        $tokenData = array(
            "iss" => $user->email,
            "exp" => $exp,
            "cid" => $user->id,
            "aud" => $request->get('password'),
            "jti" => uniqid()
        );

        $token = JWT::encode($tokenData, $this->key, $this->algo);

        return [
            'tokenType' => 'Bearer',
            'expiresIn' => $exp,
            'accessToken' => $token,
        ];
    }

    /**
     * @param User $user
     * @return array
     */
    public function generateTokenToUserBySso(User $user): array
    {
        $exp = Carbon::now()->addSeconds($this->lifetime)->timestamp;

        $tokenData = array(
            "iss" => $user->email,
            "exp" => $exp,
            "ufn" => $user->name,
            "cid" => $user->clientId,
            "sso" => true,
            "jti" => uniqid()
        );

        $token = JWT::encode($tokenData, $this->key, $this->algo);

        return [
            'tokenType' => 'Bearer',
            'expiresIn' => $exp,
            'accessToken' => $token,
        ];
    }

    /**
     * @param string $token
     * @return array|null
     * @throws UnauthorizedException
     */
    public function authByToken(string $token): ?stdClass
    {
        try {

            return $this->decode($token);
        } catch (ExpiredException $exception) {

            throw new UnauthorizedException(4011, "Token expired", 401);
        }
    }

    /**
     * @param string $token
     * @param string $key
     * @return stdClass|null
     * @throws UnauthorizedException
     */
    public function ssoAuthByToken(string $token, string $key): ?stdClass
    {
        try {
            return $this->decodeSsoToken($token, $key);
        } catch (ExpiredException $exception) {

            throw new UnauthorizedException(4012, "Token provided", 401);
        }
    }
}
