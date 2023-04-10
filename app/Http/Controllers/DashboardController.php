<?php

namespace App\Http\Controllers;

use App\Application\Dashboard\ChartDashboard\ChartDashboard;
use App\Application\Dashboard\DynamicChart\DynamicChart;
use App\Application\Dashboard\GridDashboard\GridDashboard;
use App\Application\DashboardTable\DashboardTable;
use App\Contract\CommandBus\CommandBusInterface;
use App\Domain\Account\AccountRepositoryInterface;
use App\Domain\Client\ClientRepositoryInterface;
use App\Exceptions\Client\ClientSearchExceptions;
use App\Http\Requests\ChartDashboardRequest;
use App\Http\Requests\DashboardRequest;
use App\Http\Requests\DynamicChart\DynamicChartRequest;
use App\Http\Requests\DashboardTable\DashboardTableRequest;
use App\Http\Requests\YearListRequest;
use App\Infrastructure\DatabaseRepository\AccountRepository;
use App\Infrastructure\DatabaseRepository\ClientRepository;
use App\Infrastructure\Response\ChartDashboard\ChartDashboardListDataResponse;
use App\Infrastructure\Response\Dashboard\DashboardListDataResponse;
use App\Infrastructure\Response\Dashboard\YearListDataResponse;
use App\Infrastructure\Response\DashboardTable\DashboardTableDataResponse;
use App\Infrastructure\Response\DynamicChart\DynamicChartDataResponse;
use Illuminate\Http\JsonResponse;

/**
 * Class MediaController
 * @package App\Http\Controllers
 *
 * @group Dashboard
 */
class DashboardController extends Controller
{
    /**
     * MediaController constructor.
     * @param CommandBusInterface $commandBus
     */
    public function __construct(CommandBusInterface $commandBus)
    {
        parent::__construct($commandBus);
    }
    /**
     * Client Report
     *
     * @bodyParam division array Param for filtering data. Example: [13]
     * @bodyParam provider array Param for filtering data. Example: [1]
     * @bodyParam month integer Param for filtering data. Example: 1
     * @bodyParam year integer required Param for filtering data. Example: 2020
     * @bodyParam credit boolean required Param for filtering data. Example: true
     * @bodyParam 1time boolean required Param for filtering data. Example: true
     * @bodyParam tax boolean required Param for filtering data. Example: true
     * @bodyParam client_id integer required Param for filtering data. Example: 1
     * @bodyParam page Param for pagination data. Example: 1
     * @bodyParam per_page Param for pagination data. Example: 10
     *
     * @responseFile 200 responses/dashboardClientReport.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param DashboardRequest $request
     * @return JsonResponse
     */
    public function grid(DashboardRequest $request)
    {
        return new JsonResponse(new DashboardListDataResponse(
                $this->process(
                    GridDashboard::getCommand()
                        ->setPage($request->get('page'))
                        ->setPerPage($request->get('per_page'))
                        ->setPath($request->url())
                        ->setDivision($request->get('division'))
                        ->setProvider($request->get('provider'))
                        ->setMonth($request->get('month'))
                        ->setYear($request->get('year'))
                        ->setCredit($request->get('credit'))
                        ->setOneTime($request->get('1time'))
                        ->setClientId($request->get('client_id'))
                        ->setTax($request->get('tax', false))
                )
            )
        );
    }

    /**
     * Client Chart Report
     *
     * @bodyParam year integer required Param for filtering data. Example: 2020
     * @bodyParam client_id integer required Param for filtering data. Example: 1
     * @bodyParam credit boolean Param for filtering data. Example: true
     * @bodyParam oneTime boolean Param for filtering data. Example: true
     * @bodyParam tax boolean required Param for filtering data. Example: true
     * @bodyParam businessUnitId integer Param for filtering data. Example: 1
     * @bodyParam vendorId integer Param for filtering data. Example: 1
     *
     * @responseFile 200 responses/chartDashboardReport.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param ChartDashboardRequest $request
     * @return JsonResponse
     */
    public function chart(ChartDashboardRequest $request)
    {
        return new JsonResponse(new ChartDashboardListDataResponse(

                $this->process(
                    ChartDashboard::getCommand()
                        ->setYear($request->get('year'))
                        ->setClientId($request->get('client_id'))
                        ->setVendorId($request->get('vendorId'))
                        ->setOneTime($request->get('oneTime'))
                        ->setCredit($request->get('credit'))
                        ->setBusinessUnitId($request->get('businessUnitId'))
                        ->setTax($request->get('tax'))
                )
            )
        );
    }


    /**
     * Year List
     *
     * @bodyParam clientId integer required Param for filtering data. Example: 3
     *
     * @responseFile 200 responses/yearList.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param YearListRequest $request
     * @return JsonResponse
     * @throws ClientSearchExceptions
     */
    public function year(YearListRequest $request)
    {
        try {
            /** @var AccountRepositoryInterface $clientRepository */
            $clientRepository = new AccountRepository();

            return new JsonResponse(
                new YearListDataResponse(
                    $clientRepository->getYear($request->clientId)
                )
            );

        } catch (ClientSearchExceptions $exception) {

            throw $exception;
        }
    }

    /**
     * Dynamic Chart
     *
     * @bodyParam clientId integer required Param for filtering data. Example: 3
     * @bodyParam startDate string required Format Y-m-d. Example: 2021-01-02
     * @bodyParam endDate string required Format Y-m-d. Example: 2021-01-02
     * @bodyParam dateInterval string Format Y-m-d. Example: 2021-01-02
     * @bodyParam fields array Param for filtering data. Example: ["field", "field"]
     * @bodyParam filters array Param for filtering data. Example: ["filter", "filter"]
     * @bodyParam page integer required Param for filtering data. Example: 1
     * @bodyParam perPage integer required Param for filtering data. Example: 10
     *
     * @responseFile 200 responses/dynamicChart.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param DynamicChartRequest $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function dynamicChart(DynamicChartRequest $request)
    {
        try {

            return new JsonResponse(
                new DynamicChartDataResponse(
                    $this->process(
                        DynamicChart::getCommand()
                            ->setClientId($request->get('clientId'))
                            ->setStartDate($request->get('startDate'))
                            ->setEndDate($request->get('endDate'))
                            ->setDateInterval($request->get('dateInterval'))
                            ->setFields($request->get('fields'))
                            ->setFilters($request->get('filters'))
                            ->setPage($request->get('page'))
                            ->setPerPage($request->get('perPage'))
                    )
                )
            );

        } catch (\Exception $exception) {

            throw $exception;
        }

    }

    /**
     *
     * Dashboard Table
     *
     * @bodyParam clientId integer required Param for filtering data. Example: 3
     * @bodyParam startDate string required Format Y-m-d. Example: 2021-01-02
     * @bodyParam endDate string required Format Y-m-d. Example: 2021-01-02
     * @bodyParam dateInterval string Format Y-m-d. Example: 2021-01-02
     * @bodyParam fields array Param for filtering data. Example: ["field", "field"]
     * @bodyParam filters array Param for filtering data. Example: ["filter", "filter"]
     * @bodyParam page integer required Param for filtering data. Example: 1
     * @bodyParam perPage integer required Param for filtering data. Example: 10
     *
     * @responseFile 200 responses/dashboardTable.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param DashboardTableRequest $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function dashboardTable(DashboardTableRequest $request)
    {
        try {

            return new JsonResponse(
                new DashboardTableDataResponse(
                    $this->process(
                        DashboardTable::getCommand()
                            ->setClientId($request->get('clientId'))
                            ->setStartDate($request->get('startDate'))
                            ->setEndDate($request->get('endDate'))
                            ->setDateInterval($request->get('dateInterval'))
                            ->setFields($request->get('fields'))
                            ->setFilters($request->get('filters'))
                            ->setPage($request->get('page'))
                            ->setPerPage($request->get('perPage'))
                    )
                )
            );

        } catch (\Exception $exception) {

            throw $exception;
        }

    }
}
