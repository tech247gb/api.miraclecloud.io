<?php


namespace App\Application\BusinessUnit\BusinessUnitUpdate;


use App\Contract\CommandBus\BusinessUnit\BusinessUnitUpdateCommandInterface;
use App\Contract\CommandBus\CommandInterface;

/**
 * Class BusinessUnitUpdate
 * @package App\Application\BusinessUnit\BusinessUnitUpdate
 *
 * @property int $businessUnitId
 * @property string $businessUnitName
 *
 */
class BusinessUnitUpdate implements BusinessUnitUpdateCommandInterface
{

    /**
     * @var int
     */
    private $businessUnitId;

    /**
     * @var string
     */
    private $businessUnitName;

    /**
     * BusinessUnitUpdate constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->businessUnitId = $data['businessUnitId'];
        $this->businessUnitName = $data['businessUnitName'];
    }

    /**
     * @param array $data
     * @return BusinessUnitUpdateCommandInterface
     */
    public static function getCommand(array $data = []): CommandInterface
    {
        return new self($data);
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
    public function getBusinessUnitName(): string
    {
        return $this->businessUnitName;
    }

}
