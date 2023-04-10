<?php

namespace App\Domain\User;

use Illuminate\Http\Request;

/**
 * Class UserFilter
 * @package App\Domain\User
 */
class UserFilter
{
    /**
     * @var string $email
     */
    private $email;
    /**
     * @var string $password
     */
    private $password;
    /**
     * @var string $name
     */
    private $name;
    /**
     * @var string|null
     */
    private $ip;

    /**
     * @param Request $request
     * @return UserFilter
     */
    public static function fromRequest(Request $request)
    {
        return (new self())
            ->setEmail($request->get('email'))
            ->setPassword($request->get('password'));
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return UserFilter
     */
    public function setPassword(string $password): UserFilter
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return UserFilter
     */
    public function setEmail(?string $email): UserFilter
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return UserFilter
     */
    public function setName(string $name): UserFilter
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getIp(): ?string
    {
        return $this->ip;
    }

    /**
     * @param string|null $ip
     * @return UserFilter
     */
    public function setIp(?string $ip): UserFilter
    {
        $this->ip = $ip;

        return $this;
    }

}
