<?php


namespace App\Application\Alert\AlertExportExcel;


use App\Application\Core\HandlerBase;
use App\Contract\CommandBus\CommandInterface;
use App\Contract\Repository\AlertRepositoryInterface;
use App\Domain\Alert\Alert;
use App\Domain\Alert\AlertFilter;
use Illuminate\Support\Collection;

class AlertExportExcelHandler extends HandlerBase
{

    /**
     * @var AlertRepositoryInterface
     */
    protected $alertRepository;

    /**
     * AlertExportExcelHandler constructor.
     * @param AlertRepositoryInterface $alertRepository
     */
    public function __construct(AlertRepositoryInterface $alertRepository)
    {
        $this->alertRepository = $alertRepository;
    }

    /**
     * @param AlertExportExcel|CommandInterface $command
     * @return void
     */
    protected function work(CommandInterface $command): void
    {
        $alerts = $this->alertRepository->getExportExcelList(
            $this->getFilter($command)
        );

        $file = fopen('php://output', 'w');

        fputcsv($file, Alert::$exportExcelHeaders);

        foreach ($alerts as &$alert) {

            fputcsv($file, $alert);
        }

        unset($alert);

        fclose($file);

    }

    /**
     * @param AlertExportExcel $command
     * @return AlertFilter
     */
    private function getFilter(AlertExportExcel $command): AlertFilter
    {
        return $this->alertRepository
            ->getAlertFilter()
            ->setClientId($command->getClientId())
            ->setAlertIds($command->getAlertIds());
    }

}
