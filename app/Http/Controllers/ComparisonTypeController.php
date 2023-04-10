<?php


namespace App\Http\Controllers;


use App\Application\ComparisonType\ComparisonTypeList\ComparisonTypeList;
use App\Contract\CommandBus\CommandBusInterface;
use App\Infrastructure\Response\ComparisonType\ComparisonTypeListResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class ComparisonTypeController
 * @package App\Http\Controllers
 *
 * @group Comparison Types
 */
class ComparisonTypeController extends Controller
{

    /**
     * ComparisonTypeController constructor.
     * @param CommandBusInterface $commandBus
     */
    public function __construct(CommandBusInterface $commandBus)
    {
        parent::__construct($commandBus);
    }

    /**
     * Comparison Types List
     *
     * @responseFile 200 responses/comparisonTypeList.json
     * @responseFile 401 responses/unauthorized.json
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function all()
    {

        try {

            $command = ComparisonTypeList::getCommand();

            return new JsonResponse(new ComparisonTypeListResponse($this->process($command)), Response::HTTP_OK);

        } catch (Exception $exception) {

            throw $exception;
        }

    }

}
