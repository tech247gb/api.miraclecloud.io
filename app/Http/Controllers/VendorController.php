<?php


namespace App\Http\Controllers;


use App\Application\Vendor\VendorList\VendorList;
use App\Contract\CommandBus\CommandBusInterface;
use App\Http\Requests\Vendor\VendorListRequest;
use App\Infrastructure\Response\Vendor\VendorListDataResponse;
use Illuminate\Http\JsonResponse;

/**
 * Class VendorController
 * @package App\Http\Controllers
 *
 * @group Vendors
 */
class VendorController extends Controller
{

    /**
     * VendorController constructor.
     * @param CommandBusInterface $commandBus
     */
    public function __construct(CommandBusInterface $commandBus)
    {
        parent::__construct($commandBus);
    }

    /**
     *
     * Vendor List Dynamic Dashboard
     *
     * @queryParam clientId required Param integer to related client id. Example: 2
     *
     * @responseFile 200 responses/dynamicDashboard/vendorList.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param VendorListRequest $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function vendorList(VendorListRequest $request)
    {
        try {

            return new JsonResponse(
                new VendorListDataResponse(
                    $this->process(
                        VendorList::getCommand()
                            ->setClientId($request->get('clientId'))
                    )
                )
            );

        } catch (\Exception $exception) {

            throw $exception;
        }

    }


}
