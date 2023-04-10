<?php

declare(strict_types = 1);

namespace App\Application\AlertStatus\AlertStatusList;


use App\Application\Core\HandlerBase;
use App\Contract\CommandBus\CommandInterface;
use App\Infrastructure\DatabaseRepository\AlertStatusRepository;
use Illuminate\Support\Collection;

/**
 * Class AlertStatusListHandler
 * @package App\Application\AlertStatus\AlertStatusList
 *
 * @property AlertStatusRepository $alertStatusRepository
 */
class AlertStatusListHandler extends HandlerBase
{

    /**
     * @var AlertStatusRepository $alertStatusRepository
     */
    private $alertStatusRepository;

    /**
     * AlertStatusListHandler constructor.
     * @param AlertStatusRepository $alertStatusRepository
     */
    public function __construct(AlertStatusRepository $alertStatusRepository)
    {
        $this->alertStatusRepository = $alertStatusRepository;
    }

    /**
     * @param AlertStatusList|CommandInterface $command
     *
     * @return Collection|null
     */
    protected function work(CommandInterface $command)
    {
        return $this->alertStatusRepository->all();
    }

}
