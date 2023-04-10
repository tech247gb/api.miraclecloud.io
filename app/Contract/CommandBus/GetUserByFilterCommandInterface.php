<?php


namespace App\Contract\CommandBus;

use App\Application\User\GetUserByFilter\GetUserByFilter;

/**
 * Interface CommandInterface
 * @package App\Contract\Core
 */
interface GetUserByFilterCommandInterface extends CommandInterface
{
    /**
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * @return string|null
     */
    public function getEmail(): ?string;

    /**
     * @return bool|null
     */
    public function getOne():? bool;

    /**
     * @param string|null $name
     * @return GetUserByFilter
     */
    public function setName(?string $name): GetUserByFilter;

    /**
     * @param string|null $email
     * @return GetUserByFilter
     */
    public function setEmail(?string $email): GetUserByFilter;

    /**
     * @param bool|null $one
     * @return GetUserByFilter
     */
    public function setOne(?bool $one): GetUserByFilter;

    /**
     * @return string|null
     */
    public function getPassword(): ?string;

    /**
     * @param null|string $password
     * @return GetUserByFilter
     */
    public function setPassword(?string $password): GetUserByFilter;

    /**
     * @return string|null
     */
    public function getIp(): ?string;

    /**
     * @param string|null $ip
     * @return GetUserByFilter
     */
    public function setIp(?string $ip): GetUserByFilter;
}
