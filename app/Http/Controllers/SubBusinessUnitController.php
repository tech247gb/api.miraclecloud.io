<?php


namespace App\Http\Controllers;


use App\Application\SubBusinessUnit\SubBusinessUnitCreate;
use App\Application\SubBusinessUnit\SubBusinessUnitDelete\SubBusinessUnitDelete;
use App\Application\SubBusinessUnit\SubBusinessUnitUpdate\SubBusinessUnitUpdate;
use App\Contract\CommandBus\CommandBusInterface;
use App\Exceptions\SubBusinessUnit\SubBusinessUnitUpdateException;
use App\Http\Requests\SubBusinessUnit\SubBusinessUnitCreateRequest;
use App\Http\Requests\SubBusinessUnit\SubBusinessUnitUpdateRequest;
use App\Infrastructure\Response\SubBusinessUnit\SubBusinessUnitCreateResponse;
use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Http\ResponseFactory;

/**
 * Class SubBusinessUnitController
 * @package App\Http\Controllers
 *
 * @group SubBusinessUnit
 */
class SubBusinessUnitController extends Controller
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
     * Sub Business Unit Create
     *
     * @bodyParam businessUnitId integer required Param for related business unit id. Example: 1
     * @bodyParam subBusinessUnitName string required Param for new sub business unit name. Example: "Sub Business Unit Test"
     *
     * @responseFile 200 responses/subBusinessUnitCreate.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param SubBusinessUnitCreateRequest $request
     * @return JsonResponse
     */
    public function create(SubBusinessUnitCreateRequest $request)
    {
        return new JsonResponse(
            new SubBusinessUnitCreateResponse(
                $this->process(
                    SubBusinessUnitCreate::getCommand([
                        'businessUnitId' => $request->get('businessUnitId'),
                        'subBusinessUnitName' => $request->get('subBusinessUnitName')
                    ])
                )
            )
        );
    }

    /**
     * Sub Business Unit Update
     *
     * Path parameter id integer required
     *
     * @bodyParam subBusinessUnitName string required Param for update sub business unit name. Example: "Sub Business Unit Test"
     *
     * @responseFile 200 responses/noContent.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param $id
     * @param SubBusinessUnitUpdateRequest $request
     * @return ResponseFactory
     * @throws \Exception
     */
    public function update($id, SubBusinessUnitUpdateRequest $request)
    {

        try {

            $this->process(
                SubBusinessUnitUpdate::getCommand([
                    'subBusinessUnitId' => $id,
                    'subBusinessUnitName' => $request->get('subBusinessUnitName')
                ])
            );

            return response('', 204);

        } catch (\Exception $exception) {

            throw $exception;
        }

    }

    /**
     * Sub Business Unit Delete
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
                SubBusinessUnitDelete::getCommand([
                    'subBusinessUnitId' => $id
                ])
            );

            return response('', 204);

        } catch (\Exception $exception) {

            throw $exception;
        }
    }

}
