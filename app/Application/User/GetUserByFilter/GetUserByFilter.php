<?php

namespace App\Application\User\GetUserByFilter;


use App\Contract\CommandBus\CommandInterface;
use App\Contract\CommandBus\GetUserByFilterCommandInterface;
use App\Contract\CommandBus\GetUserByIdCommandInterface;

/**
 * Class GetUserByFilter
 * @package App\Application\User\GetUserByFilter
 */
class GetUserByFilter implements GetUserByFilterCommandInterface
{
    /**
     * @var string|null
     */
    private $name;
    /**
     * @var string|null
     */
    private $email;
    /**
     * @var string|null
     */
    private $password;
    /**
     * @var bool|null
     */
    private $one;
    /**
     * @var bool|null
     */
    private $isSSO;
    /**
     * @var string|null
     */
    private $ip;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return bool|null
     */
    public function getOne(): ? bool
    {
        return $this->one;
    }

    /**
     * @param string|null $name
     * @return GetUserByFilter
     */
    public function setName(?string $name): GetUserByFilter
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string|null $email
     * @return GetUserByFilter
     */
    public function setEmail(?string $email): GetUserByFilter
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @param bool|null $one
     * @return GetUserByFilter
     */
    public function setOne(?bool $one): GetUserByFilter
    {
        $this->one = $one;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param null|string $password
     * @return GetUserByFilter
     */
    public function setPassword(?string $password): GetUserByFilter
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return GetUserByFilter
     */
    public static function getCommand(): CommandInterface
    {
        return new self();
    }

    /**
     * @param bool|null $sSO
     * @return $this
     */
    public function setSSO(?bool $sSO)
    {
        $this->isSSO = $sSO;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function isSSO(): ?bool
    {

        return $this->isSSO;
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
     * @return GetUserByFilter
     */
    public function setIp(?string $ip): GetUserByFilter
    {
        $this->ip = $ip;

        return $this;
    }

}
