<?php


namespace App\Domain\SubBusinessUnit;

/**
 * Class SubBusinessUnit
 * @package App\Domain\SubBusinessUnit
 */
class SubBusinessUnit
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $businessUnitId;

    /**
     * @var string
     */
    private $name;

    /**
     * SubBusinessUnit constructor.
     * @param int $id
     * @param int $businessUnitId
     * @param string $name
     */
    public function __construct(int $id, int $businessUnitId, string $name)
    {
        $this->id = $id;
        $this->businessUnitId = $businessUnitId;
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getBusinessUnitId(): int
    {
        return $this->businessUnitId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

}
