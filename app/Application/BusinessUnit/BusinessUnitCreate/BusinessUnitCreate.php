<?php


namespace App\Application\BusinessUnit\BusinessUnitCreate;


use App\Contract\CommandBus\BusinessUnit\BusinessUnitCreateCommandInterface;
use App\Contract\CommandBus\CommandInterface;

/**
 * Class BusinessUnitCreate
 * @package App\Application\BusinessUnit\BusinessUnitCreate
 *
 * @property int $clientId
 * @property string $businessUnitName
 *
 */
class BusinessUnitCreate implements BusinessUnitCreateCommandInterface
{

    /**
     * BusinessUnitCreate constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->clientId = $data['clientId'];
        $this->businessUnitName = $data['businessUnitName'];
    }


    /**
     * @var int
     */
    private $clientId;

    /**
     * @var string
     */
    private $businessUnitName;

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->clientId;
    }

    /**
     * @return string
     */
    public function getBusinessUnitName(): string
    {
        return $this->businessUnitName;
    }

    /**
     * @param array $data
     * @return BusinessUnitCreateCommandInterface
     */
    public static function getCommand(array $data = []): CommandInterface
    {
        return new self($data);
    }

}
