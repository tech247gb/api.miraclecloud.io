<?php


namespace App\Application\Frequency\FrequencyShowByAlertTypeId;


use App\Application\Core\HandlerBase;
use App\Contract\CommandBus\CommandInterface;
use App\Contract\Repository\FrequencyRepositoryInterface;
use App\Domain\Frequency\FrequencyFilter;

class FrequencyShowByAlertTypeIdHandler extends HandlerBase
{

    /**
     * @var FrequencyRepositoryInterface $frequencyRepository
     */
    private $frequencyRepository;

    /**
     * FrequencyShowByAlertTypeIdHandler constructor.
     * @param FrequencyRepositoryInterface $frequencyRepository
     */
    public function __construct(FrequencyRepositoryInterface $frequencyRepository)
    {
        $this->frequencyRepository = $frequencyRepository;
    }

    /**
     * @param FrequencyShowByAlertTypeId|CommandInterface $command
     */
    protected function work(CommandInterface $command)
    {
        return $this->frequencyRepository->getFrequencyListByAlertTypeId($this->getFilter($command));
    }

    /**
     * @param FrequencyShowByAlertTypeId $command
     * @return FrequencyFilter
     */
    private function getFilter(FrequencyShowByAlertTypeId $command): FrequencyFilter
    {
        return $this->frequencyRepository->getFrequencyFilter()->setAlertTypeId($command->getAlertTypeId());
    }

}
