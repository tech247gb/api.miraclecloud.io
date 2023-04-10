<?php

namespace App\Contract\Core;

/**
 * Interface PaginationInterface
 * @package App\Contract\Core
 */
interface PaginationInterface
{
    /**
     * @return int
     */
    public function getPage(): int;

    /**
     * @return int
     */
    public function getPerPage(): int;

    /**
     * @return string|null
     */
    public function getPath(): ?string;

    /**
     * @param null|string $path
     * @return PaginationInterface
     */
    public function setPath(?string $path): self;
}
