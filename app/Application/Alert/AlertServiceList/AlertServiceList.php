<?php


namespace App\Application\Alert\AlertServiceList;


use App\Application\Core\CommandBase;

class AlertServiceList extends CommandBase
{

    /**
     * @var int
     */
    private $productId;

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     * @return AlertServiceList
     */
    public function setProductId(int $productId): self
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * @return bool
     */
    public function validateCommand(): bool
    {
        return true;
    }

}
