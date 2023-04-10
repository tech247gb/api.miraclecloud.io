<?php

namespace App\Application\Client\ListClient;

use App\Contract\CommandBus\CommandInterface;
use App\Contract\CommandBus\Client\ListClientCommandInterface;
use App\Infrastructure\Core\Pagination;

/**
 * Class ListClient
 * @package App\Application\Client
 */
class ListClient implements ListClientCommandInterface
{
    /** @var int $page */
    private $page;

    /** @var int $perPage */
    private $perPage;
    /**
     * @var string|null $path
     */
    private $path;
    /**
     * @var int|null $status
     */
    private $status;

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     * @return ListClientCommandInterface
     */
    public function setPage(?int $page): ListClientCommandInterface
    {
        $this->page = intval($page) ?: Pagination::DEFAULT_PAGE;

        return $this;
    }

    /**
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->perPage;
    }

    /**
     * @param int $perPage
     * @return ListClientCommandInterface
     */
    public function setPerPage(?int $perPage): ListClientCommandInterface
    {
        $this->perPage = intval($perPage) ?: Pagination::DEFAULT_PER_PAGE;

        return $this;
    }

    /**
     * @param null|string $path
     * @return ListClientCommandInterface
     */
    public function setPath(?string $path): ListClientCommandInterface
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

    /**
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @param int|null $status
     * @return ListClientCommandInterface
     */
    public function setStatus(?int $status): ListClientCommandInterface
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return self
     */
    public static function getCommand(): CommandInterface
    {
        return new self();
    }
}
