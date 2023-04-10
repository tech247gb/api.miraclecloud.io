<?php


namespace App\Application\SubBusinessUnit\SubBusinessUnitDelete;


use App\Contract\CommandBus\CommandInterface;
use App\Contract\CommandBus\SubBusinessUnit\SubBusinessUnitDeleteCommandInterface;

/**
 * Class SubBusinessUnitDelete
 * @package App\Application\SubBusinessUnit\SubBusinessUnitDelete
 *
 * @property int $subBusinessUnitId
 */
class SubBusinessUnitDelete implements SubBusinessUnitDeleteCommandInterface
{

    /**
     * @var int
     */
    private $subBusinessUnitId;

    /**
     * SubBusinessUnitDelete constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->subBusinessUnitId = $data['subBusinessUnitId'];
    }

    /**
     * @return int
     */
    public function getSubBusinessUnitId(): int
    {
        return $this->subBusinessUnitId;
    }

    /**
     * @param array $data
     * @return SubBusinessUnitDeleteCommandInterface
     */
    public static function getCommand(array $data = []): CommandInterface
    {
        return new self($data);
    }

}
