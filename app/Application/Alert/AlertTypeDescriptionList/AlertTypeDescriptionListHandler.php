<?php


namespace App\Application\Alert\AlertTypeDescriptionList;


use App\Application\Core\HandlerBase;
use App\Contract\CommandBus\CommandInterface;
use App\Contract\Repository\AlertRepositoryInterface;
use Illuminate\Support\Collection;

class AlertTypeDescriptionListHandler extends HandlerBase
{

    /**
     * @var AlertRepositoryInterface $alertRepository
     */
    protected $alertRepository;

    /**
     * AlertTypeDescriptionListHandler constructor.
     * @param AlertRepositoryInterface $alertRepository
     */
    public function __construct(AlertRepositoryInterface $alertRepository)
    {
        $this->alertRepository = $alertRepository;
    }

    /**
     * @param CommandInterface $command
     * @return Collection
     */
    protected function work(CommandInterface $command)
    {
        return $this->alertRepository->getTypesDescriptions();
    }

}
