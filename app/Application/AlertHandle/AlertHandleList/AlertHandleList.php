<?php

declare(strict_types = 1);

namespace App\Application\AlertHandle\AlertHandleList;


use App\Application\Core\CommandBase;
use App\Contract\Exception\CustomExceptionCodeInterface;
use App\Exceptions\UnprocessableCommandException;
use App\Infrastructure\Core\Pagination;

/**
 * Class AlertHandleLIst
 * @package App\Application\AlertHandle\AlertHandleList
 *
 * @property Pagination|null $pagination
 * @property int|null $clientId
 * @property int|null $statusId
 */
class AlertHandleList extends CommandBase
{

    /**
     * @var Pagination|null
     */
    private $pagination;

    /**
     * @var int|null
     */
    private $clientId;

    /**
     * @var int|null
     */
    private $statusId;

    /**
     * @return Pagination|null
     */
    public function getPagination(): ?Pagination
    {
        return $this->pagination;
    }

    /**
     * @param Pagination|null $pagination
     * @return AlertHandleList
     */
    public function setPagination(?Pagination $pagination): self
    {
        $this->pagination = $pagination;

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
     *
     * @return AlertHandleList
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
     *
     * @return AlertHandleList
     */
    public function setStatusId(?int $statusId): self
    {
        $this->statusId = $statusId;

        return $this;
    }

    /**
     * @return bool
     *
     * @throws UnprocessableCommandException
     */
    public function validateCommand(): bool
    {
        if (is_null($this->statusId) || is_null($this->clientId)) {

            throw UnprocessableCommandException::getClass(
                CustomExceptionCodeInterface::ALERT_HANDLE_LIST_COMMAND
            );
        }

        return true;
    }

}
