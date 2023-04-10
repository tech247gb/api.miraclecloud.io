<?php


namespace App\Application\SubBusinessUnit;


use App\Contract\CommandBus\CommandInterface;
use App\Contract\CommandBus\SubBusinessUnit\SubBusinessUnitCreateCommandInterface;

/**
 * Class SubBusinessUnitCreate
 * @package App\Application\SubBusinessUnit
 *
 * @property int $businessUnitId
 * @property string $subBusinessUnitName
 */
class SubBusinessUnitCreate implements SubBusinessUnitCreateCommandInterface
{

    /**
     * @var int
     */
    private $businessUnitId;

    /**
     * @var string
     */
    private $subBusinessUnitName;

    /**
     * SubBusinessUnitCreate constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->businessUnitId = $data['businessUnitId'];
        $this->subBusinessUnitName = $data['subBusinessUnitName'];
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
    public function getSubBusinessUnitName(): string
    {
        return $this->subBusinessUnitName;
    }


    /**
     * @param array $data
     * @return SubBusinessUnitCreateCommandInterface
     */
    public static function getCommand(array $data = []): CommandInterface
    {
        return new self($data);
    }

}
