<?php

namespace App\Http\Controllers;

use App\Application\BusinessUnit\BusinessUnitCreate\BusinessUnitCreate;
use App\Application\BusinessUnit\BusinessUnitDelete\BusinessUnitDelete;
use App\Application\BusinessUnit\BusinessUnitUpdate\BusinessUnitUpdate;
use App\Contract\CommandBus\CommandBusInterface;
use App\Http\Requests\BusinessUnit\BusinessUnitUpdateRequest;
use App\Http\Requests\BusinessUnitCreateRequest;
use App\Http\Requests\BusinessUnitRequest;
use App\Http\Requests\SubBusinessUnitRequest;
use App\Http\Requests\VendorListRequest;
use App\Infrastructure\DatabaseRepository\BusinessUnitRepository;
use App\Infrastructure\Response\BusinessUnit\BusinessUnitCreateDataResponse;
use App\Infrastructure\Response\BusinessUnit\BusinessUnitListDataResponse;
use App\Infrastructure\Response\BusinessUnit\SubBusinessUnitListDataResponse;
use App\Infrastructure\Response\BusinessUnit\VendorListDataResponse;
use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Http\ResponseFactory;
use Mockery\Exception;

/**
 * Class BusinessUnitController
 * @package App\Http\Controllers
 *
 * @group BusinessUnit
 */
class BusinessUnitController extends Controller
{
    /**
     * BusinessUnitController constructor.
     * @param CommandBusInterface $commandBus
     */
    public function __construct(CommandBusInterface $commandBus)
    {
        parent::__construct($commandBus);
    }


    /**
     * Business Units List
     *
     * @bodyParam clientId required integer Param for filtering data. Example: 1
     * @bodyParam status required Param can be 5 - active or 1 - innactive or null. Example: 5|1|null
     *
     * @responseFile 200 responses/businessUnits.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param BusinessUnitRequest $request
     * @return JsonResponse
     */
    public function unit(BusinessUnitRequest $request)
    {
        /** @var BusinessUnitRepository $repository */
        $repository = new BusinessUnitRepository();

        return new JsonResponse(new BusinessUnitListDataResponse(
                $repository->getBusinessUnitsList(
                    $request->get('clientId'),
                    $request->get('status')
                )
            )
        );
    }

    /**
     * Sub Business Units List
     *
     * @queryParam businessUnitId integer required Field to sort by Example: 17
     * @queryParam status required Param can be 5 - active or 1 - innactive or null - all for filtering data.
     *
     * @responseFile 200 responses/subBusinessUnits.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param SubBusinessUnitRequest $request
     * @return JsonResponse
     */
    public function subUnit(SubBusinessUnitRequest $request)
    {
        try {

            /** @var BusinessUnitRepository $repository */
            $repository = new BusinessUnitRepository();

            return new JsonResponse(
                new SubBusinessUnitListDataResponse(
                    $repository->getSubBusinessUnitsList(
                        $request->get('businessUnitId'),
                        $request->get('status') ?: null
                    )
                )
            );

        } catch (Exception $exception) {

            throw $exception;
        }
    }

    /**
     * Vendors List
     *
     * @queryParam clientId integer Field to sort by Example: 3
     *
     * @responseFile 200 responses/vendorsList.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param VendorListRequest $request
     * @return JsonResponse
     */
    public function vendorsList(VendorListRequest $request)
    {
        try {

            /** @var BusinessUnitRepository $repository */
            $repository = new BusinessUnitRepository();

            return new JsonResponse(
                new VendorListDataResponse(
                    $repository->getVendorsList($request->get('clientId'))
                )
            );

        } catch (Exception $exception) {

            throw $exception;
        }
    }

    /**
     * Business Unit Create
     *
     * @bodyParam clientId integer required Param for related client id data. Example: 1
     * @bodyParam businessUnitName string required Param for new business unit name. Example: "Business Unit Test"
     *
     * @responseFile 200 responses/businessUnitCreate.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     *
     * @param BusinessUnitCreateRequest $request
     * @return JsonResponse
     */
    public function create(BusinessUnitCreateRequest $request)
    {
        return new JsonResponse(
            new BusinessUnitCreateDataResponse(
                $this->process(
                    BusinessUnitCreate::getCommand([
                        'clientId' => $request->get('clientId'),
                        'businessUnitName' => $request->get('businessUnitName')
                    ])
                )
            )
        );
    }

    /**
     * Business Unit Update
     *
     * Path param id int required
     *
     * @bodyParam businessUnitName string required Param for update business unit name. Example: "Business Unit Test"
     *
     * @responseFile 204 responses/businessUnitUpdate.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param $id
     * @param BusinessUnitUpdateRequest $request
     * @return ResponseFactory
     * @throws \Exception
     */
    public function update($id, BusinessUnitUpdateRequest $request)
    {
        try {

            $this->process(
                BusinessUnitUpdate::getCommand([
                    'businessUnitId' => $id,
                    'businessUnitName' => $request->get('businessUnitName'),
                ])
            );

            return response('', 204);

        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Business Unit Delete
     *
     * Path param id int required
     *
     * @responseFile 204 responses/noContent.json
     * @responseFile 401 responses/unauthorized.json
     *
     * @param $id
     * @return ResponseFactory
     * @throws \Exception
     */
    public function delete($id)
    {
        try {

            $this->process(
                BusinessUnitDelete::getCommand([
                    'businessUnitId' => $id
                ])
            );

            return response('', 204);

        } catch (\Exception $exception) {

            throw $exception;
        }
    }
}
