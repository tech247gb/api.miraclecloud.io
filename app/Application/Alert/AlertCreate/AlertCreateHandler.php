<?php


namespace App\Application\Alert\AlertCreate;


use App\Application\Core\HandlerBase;
use App\Contract\CommandBus\CommandInterface;
use App\Contract\Repository\AlertRepositoryInterface;
use App\Domain\Alert\AlertFilter;
use App\Exceptions\Alert\AlertCreateException;

class AlertCreateHandler extends HandlerBase
{

    /**
     * @var AlertRepositoryInterface $alertRepository
     */
    protected $alertRepository;

    /**
     * AlertListHandler constructor.
     * @param AlertRepositoryInterface $alertRepository
     */
    public function __construct(AlertRepositoryInterface $alertRepository)
    {
        $this->alertRepository = $alertRepository;
    }

    /**
     * @param AlertCreate|CommandInterface $command
     * @throws AlertCreateException
     */
    protected function work(CommandInterface $command)
    {

        if (!$this->alertRepository->create($this->getFilter($command))) {

            throw new AlertCreateException();
        }
    }

    /**
     * @param AlertCreate $command
     * @return AlertFilter
     */
    private function getFilter(AlertCreate $command): AlertFilter
    {
        return $this->alertRepository->getAlertFilter()
            ->setClientId($command->getClientId())
            ->setAlertName($command->getAlertName())
            ->setAlertTypeId($command->getAlertTypeId())
            ->setAlertSourceId($command->getAlertSourceId())
            ->setProductId($command->getProductId())
            ->setEntityTypeId($command->getEntityTypeId())
            ->setEntityId($command->getEntityId())
            ->setTagKey($command->getTagKey())
            ->setTagValue($command->getTagValue())
            ->setComparisonTypeId($command->getComparisonTypeId())
            ->setPercentageOfComparison($command->getPercentageOfComparison())
            ->setWithinMonth($command->getWithinMonth())
            ->setWithinDay($command->getWithinDay())
            ->setCondition($command->getCondition())
            ->setOwnerId($command->getOwnerId())
            ->setEmailCC($command->getEmailCC());
    }

}
