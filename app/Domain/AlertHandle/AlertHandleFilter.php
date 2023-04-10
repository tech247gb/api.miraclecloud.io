<?php

declare(strict_types = 1);

namespace App\Domain\AlertHandle;

/**
 * Class AlertHandleFilter
 * @package App\Domain\AlertHandle
 *
 * @property int|null $page
 * @property int|null $perPage
 * @property int|null $clientId
 * @property int|null $statusId
 */
class AlertHandleFilter
{

    /**
     * @var int|null
     */
    private $page;

    /**
     * @var int|null
     */
    private $perPage;

    /**
     * @var int|null
     */
    private $clientId;

    /**
     * @var int|null
     */
    private $statusId;

    /**
     * @return int|null
     */
    public function getPage(): ?int
    {
        return $this->page;
    }

    /**
     * @param int|null $page
     * @return AlertHandleFilter
     */
    public function setPage(?int $page): self
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPerPage(): ?int
    {
        return $this->perPage;
    }

    /**
     * @param int|null $perPage
     * @return AlertHandleFilter
     */
    public function setPerPage(?int $perPage): self
    {
        $this->perPage = $perPage;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getClientId(): ?int
    {
        return $this->clientId;
    }

    /**
     * @param int|null $clientId
     * @return AlertHandleFilter
     */
    public function setClientId(?int $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getStatusId(): ?int
    {
        return $this->statusId;
    }

    /**
     * @param int|null $statusId
     * @return AlertHandleFilter
     */
    public function setStatusId(?int $statusId): self
    {
        $this->statusId = $statusId;

        return $this;
    }

}
