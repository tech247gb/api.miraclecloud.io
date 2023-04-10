<?php


namespace App\Application\PowerBI\GetReportEmbedToken;


use App\Application\Core\CommandBase;
use App\Contract\Exception\CustomExceptionCodeInterface;
use App\Exceptions\UnprocessableCommandException;

class GetReportEmbedToken extends CommandBase
{
    /**
     * @var string|null
     */
    private $groupId;

    /**
     * @var string|null
     */
    private $reportId;

    /**
     * @return string|null
     */
    public function getGroupId(): ?string
    {
        return $this->groupId;
    }

    /**
     * @param string|null $groupId
     * @return GetReportEmbedToken
     */
    public function setGroupId(?string $groupId): self
    {
        $this->groupId = $groupId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getReportId(): ?string
    {
        return $this->reportId;
    }

    /**
     * @param string|null $reportId
     * @return GetReportEmbedToken
     */
    public function setReportId(?string $reportId): self
    {
        $this->reportId = $reportId;

        return $this;
    }

    /**
     * @return bool
     * @throws UnprocessableCommandException
     */
    public function validateCommand(): bool
    {
        if (is_null($this->getGroupId()) || is_null($this->getReportId())) {

            throw new UnprocessableCommandException(
                CustomExceptionCodeInterface::POWER_BI_GET_EMBED_TOKEN_COMMAND_VALIDATION_EXCEPTION
            );
        }

        return true;
    }

}
