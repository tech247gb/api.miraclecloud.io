<?php

namespace App\Application\Dashboard\GridDashboard;

use App\Contract\CommandBus\CommandInterface;
use App\Contract\CommandBus\Dashboard\GridDashboardCommandInterface;
use App\Infrastructure\Core\Pagination;

/**
 * Class ListDashboard
 * @package App\Application\Dashboard
 */
class GridDashboard implements GridDashboardCommandInterface
{
    /**
     * @var int $page
     */
    private $page;
    /**
     * @var int $perPage
     */
    private $perPage;
    /**
     * @var string|null $path
     */
    private $path;
    /**
     * @var array $division
     */
    private $division = [];
    /**
     * @var array $provider
     */
    private $provider = [];
    /**
     * @var int|null $month
     */
    private $month;
    /**
     * @var int $year
     */
    private $year;
    /**
     * @var bool $credit
     */
    private $credit;
    /**
     * @var bool $oneTime
     */
    private $oneTime;
    /**
     * @var int $clientId
     */
    private $clientId;
    /**
     * @var bool $tax
     */
    private $tax;

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     * @return GridDashboardCommandInterface
     */
    public function setPage(?int $page): GridDashboardCommandInterface
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
     * @return GridDashboardCommandInterface
     */
    public function setPerPage(?int $perPage): GridDashboardCommandInterface
    {
        $this->perPage = intval($perPage) ?: Pagination::DEFAULT_PER_PAGE;

        return $this;
    }

    /**
     * @param null|string $path
     * @return GridDashboardCommandInterface
     */
    public function setPath(?string $path): GridDashboardCommandInterface
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
     * @return array
     */
    public function getDivision(): array
    {
        return $this->division;
    }

    /**
     * @param array|null $division
     * @return GridDashboardCommandInterface
     */
    public function setDivision(?array $division): GridDashboardCommandInterface
    {
        $this->division = $division ?: [];

        return $this;
    }

    /**
     * @return array
     */
    public function getProvider(): array
    {
        return $this->provider;
    }

    /**
     * @param array|null $provider
     * @return GridDashboardCommandInterface
     */
    public function setProvider(?array $provider): GridDashboardCommandInterface
    {
        $this->provider = $provider ?: [];

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMonth():? int
    {
        return $this->month;
    }

    /**
     * @param int|null $month
     * @return GridDashboardCommandInterface
     */
    public function setMonth(?int $month): GridDashboardCommandInterface
    {
        $this->month = $month;

        return $this;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     * @return GridDashboardCommandInterface
     */
    public function setYear(int $year): GridDashboardCommandInterface
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @return bool
     */
    public function getCredit(): bool
    {
        return $this->credit;
    }

    /**
     * @param bool $credit
     * @return GridDashboardCommandInterface
     */
    public function setCredit(bool $credit): GridDashboardCommandInterface
    {
        $this->credit = $credit;

        return $this;
    }

    /**
     * @return bool
     */
    public function getOneTime(): bool
    {
        return $this->oneTime;
    }

    /**
     * @param bool $oneTime
     * @return GridDashboardCommandInterface
     */
    public function setOneTime(bool $oneTime): GridDashboardCommandInterface
    {
        $this->oneTime = $oneTime;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getClientId():? int
    {
        return $this->clientId;
    }

    /**
     * @param int|null $clientId
     * @return GridDashboardCommandInterface
     */
    public function setClientId(?int $clientId): GridDashboardCommandInterface
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * @return self
     */
    public static function getCommand(): CommandInterface
    {
        return new self();
    }

    /**
     * @return bool
     */
    public function getTax(): bool
    {
        return $this->tax;
    }

    /**
     * @param bool $tax
     * @return GridDashboardCommandInterface
     */
    public function setTax(bool $tax): GridDashboardCommandInterface
    {
        $this->tax = $tax;

        return $this;
    }
}
