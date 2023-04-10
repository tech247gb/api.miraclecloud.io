<?php


namespace App\Application\BusinessUnit\BusinessUnitDelete;


use App\Contract\CommandBus\BusinessUnit\BusinessUnitDeleteCommandInterface;
use App\Contract\CommandBus\CommandInterface;

/**
 * Class BusinessUnitDelete
 * @package App\Application\BusinessUnit\BusinessUnitDelete
 *
 * @property int $businessUnitId
 */
class BusinessUnitDelete implements BusinessUnitDeleteCommandInterface
{

    /**
     * @var int
     */
    private $businessUnitId;

    /**
     * BusinessUnitDelete constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->businessUnitId = $data['businessUnitId'];
    }

    /**
     * @return int
     */
    public function getBusinessUnitId(): int
    {
        return $this->businessUnitId;
    }

    /**
     * @param array $data
     * @return BusinessUnitDeleteCommandInterface
     */
    public static function getCommand(array $data = []): CommandInterface
    {
        return new self($data);
    }

}
