<?php


namespace App\Application\Product\ProductList;


use App\Application\Core\HandlerBase;
use App\Contract\CommandBus\CommandInterface;
use App\Contract\Repository\ProductRepositoryInterface;
use Illuminate\Support\Collection;

class ProductListHandler extends HandlerBase
{

    /**
     * @var ProductRepositoryInterface $productRepository
     */
    protected $productRepository;

    /**
     * ProductListHandler constructor.
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param CommandInterface $command
     * @return Collection
     */
    protected function work(CommandInterface $command): Collection
    {
        return $this->productRepository->all();
    }

}
