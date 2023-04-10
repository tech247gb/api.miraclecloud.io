<?php

declare(strict_types = 1);

namespace App\Infrastructure\Core;

use App\Contract\Core\PaginationInterface;

/**
 * Class Pagination
 * @package App\Infrastructure\Core
 *
 * @property int $page
 * @property int $perPage
 * @property string $path
 */
class Pagination implements PaginationInterface
{
    const DEFAULT_PAGE = 1;
    const DEFAULT_PER_PAGE = 10;

    /** @var int $page */
    private $page;

    /** @var int $perPage */
    private $perPage;
    /**
     * @var string
     */
    private $path;

    /**
     * Pagination constructor.
     * @param int $page
     * @param int $perPage
     * @param string $path
     */
    public function __construct(int $page = self::DEFAULT_PAGE, int $perPage = self::DEFAULT_PER_PAGE, string $path = '')
    {
        $this->page = $page;
        $this->perPage = $perPage;
        $this->path = $path;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->perPage;
    }

    /**
     * @param null|string $path
     * @return PaginationInterface
     */
    public function setPath(?string $path): PaginationInterface
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPath(): ?string
    {
        return $this->path;
    }
}
