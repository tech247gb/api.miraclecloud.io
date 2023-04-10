<?php


namespace App\Http\Controllers;


use App\Application\DynamicDashboard\Account\AccountList\AccountList;
use App\Contract\CommandBus\CommandBusInterface;
use App\Http\Requests\AccountListRequest;
use App\Infrastructure\Response\DynamicDashboard\AccountList\AccountListDataResponse;
use Illuminate\Http\JsonResponse;

/**
 * Class AccountController
 * @package App\Http\Controllers
 *
 * @group Accounts
 */
class AccountController extends Controller
{

    /**
     * AccountController constructor.
     * @param CommandBusInterface $commandBus
     */
    public function __construct(CommandBusInterface $commandBus)
    {
        parent::__construct($commandBus);
    }

    /**
     * Account List Dynamic Dashboard
     *
     * @queryParam clientId required Param integer to related client id. Example: 2
     *
     * @responseFile 200 responses/dynamicDashboard/accountList.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param AccountListRequest $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function accountListDynamicDashboard(AccountListRequest $request)
    {
        try {

            return new JsonResponse(
                new AccountListDataResponse(
                    $this->process(
                        AccountList::getCommand()
                            ->setClientId($request->get('clientId'))
                    )
                )
            );

        } catch (\Exception $exception) {

            throw $exception;
        }
    }

}
