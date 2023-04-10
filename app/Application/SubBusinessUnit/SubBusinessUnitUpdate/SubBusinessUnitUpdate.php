<?php


namespace App\Application\SubBusinessUnit\SubBusinessUnitUpdate;


use App\Contract\CommandBus\CommandInterface;
use App\Contract\CommandBus\SubBusinessUnit\SubBusinessUnitUpdateCommandInterface;

/**
 * Class SubBusinessUnitUpdate
 * @package App\Application\SubBusinessUnit\SubBusinessUnitUpdate
 *
 * @property int $subBusinessUnitId
 * @property string $subBusinessUnitName
 */
class SubBusinessUnitUpdate implements SubBusinessUnitUpdateCommandInterface
{

    /**
     * @var int
     */
    private $subBusinessUnitId;

    /**
     * @var string
     */
    private $subBusinessUnitName;

    /**
     * SubBusinessUnitUpdate constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->subBusinessUnitId = $data['subBusinessUnitId'];
        $this->subBusinessUnitName = $data['subBusinessUnitName'];
    }

    /**
     * @return int
     */
    public function getSubBusinessUnitId(): int
    {
        return $this->subBusinessUnitId;
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
     * @return SubBusinessUnitUpdateCommandInterface
     */
    public static function getCommand(array $data = []): CommandInterface
    {
        return new self($data);
    }

}
