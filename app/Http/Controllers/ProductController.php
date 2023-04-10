<?php


namespace App\Http\Controllers;


use App\Application\Product\ProductList\ProductList;
use App\Contract\CommandBus\CommandBusInterface;
use App\Infrastructure\Response\Product\ProductListResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ProductController
 * @package App\Http\Controllers
 *
 * @group Products
 */
class ProductController extends Controller
{

    /**
     * ProductController constructor.
     * @param CommandBusInterface $commandBus
     */
    public function __construct(CommandBusInterface $commandBus)
    {
        parent::__construct($commandBus);
    }

    /**
     * Product List
     *
     * @responseFile 200 responses/productList.json
     * @responseFile 401 responses/unauthorized.json
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function all()
    {
        try {

            $command = ProductList::getCommand();

            return new JsonResponse(new ProductListResponse($this->process($command)), Response::HTTP_OK);

        } catch (Exception $exception) {

            throw $exception;
        }

    }

}
