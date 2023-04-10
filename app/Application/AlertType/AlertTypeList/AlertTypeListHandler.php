<?php


namespace App\Application\AlertType\AlertTypeList;



use App\Application\Core\HandlerBase;
use App\Contract\CommandBus\CommandInterface;
use App\Contract\Repository\AlertTypeRepositoryInterface;
use Illuminate\Support\Collection;

class AlertTypeListHandler extends HandlerBase
{

    /**
     * @var AlertTypeRepositoryInterface
     */
    protected $alertTypeRepository;

    /**
     * AlertTypeListHandler constructor.
     * @param AlertTypeRepositoryInterface $alertTypeRepository
     */
    public function __construct(AlertTypeRepositoryInterface $alertTypeRepository)
    {
        $this->alertTypeRepository = $alertTypeRepository;
    }

    /**
     * @param AlertTypeList|CommandInterface $command
     * @return Collection
     */
    protected function work(CommandInterface $command): Collection
    {
        return $this->alertTypeRepository->all();
    }

}
