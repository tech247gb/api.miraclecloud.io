<?php


namespace App\Infrastructure\DatabaseRepository;


use App\Contract\Repository\ProductRepositoryInterface;
use App\Domain\Dashboard\DbModel;
use App\Domain\Product\Product;
use Illuminate\Support\Collection;

class ProductRepository implements ProductRepositoryInterface
{

    /** @var DbModel $model */
    private $model;

    /**
     * ProductRepository constructor.
     * @param DbModel $model
     */
    public function __construct(DbModel $model)
    {
        $this->model = $model;
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->mapListAll($this->model->getProductList());
    }

    /**
     * @param Collection $products
     * @return Collection
     */
    private function mapListAll(Collection $products): Collection
    {
        return $products->map(function ($product) {

            $productModel = new Product();
            $productModel->setId($product->ProductID);
            $productModel->setName($product->ProductName);

            return $productModel;
        });

    }

}
