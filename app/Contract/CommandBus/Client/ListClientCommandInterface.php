<?php

namespace App\Contract\CommandBus\Client;

use App\Contract\CommandBus\CommandInterface;

/**
 * Interface ListClientCommandInterface
 * @package App\Contract\CommandBus\Client
 */
interface ListClientCommandInterface extends CommandInterface
{
    /**
     * @return int
     */
    public function getPage(): int;

    /**
     * @param int $page
     * @return self
     */
    public function setPage(?int $page): self;

    /**
     * @return int
     */
    public function getPerPage(): int;

    /**
     * @param int $perPage
     * @return self
     */
    public function setPerPage(?int $perPage): self;

    /**
     * @return string|null
     */
    public function getPath(): ?string;

    /**
     * @param null|string $path
     * @return self
     */
    public function setPath(?string $path): self;

    /**
     * @return int|null
     */
    public function getStatus(): ?int;

    /**
     * @param int|null $status
     * @return self
     */
    public function setStatus(?int $status): self;

    /**
     * @return self
     */
    public static function getCommand(): CommandInterface;
}
