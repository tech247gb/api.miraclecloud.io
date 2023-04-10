<?php


namespace App\Application\Product\ProductList;


use App\Application\Core\CommandBase;

class ProductList extends CommandBase
{

    /**
     * @return bool
     */
    public function validateCommand(): bool
    {
        return true;
    }

}
