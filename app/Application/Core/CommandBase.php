<?php


namespace App\Application\Core;


use App\Contract\CommandBus\CommandInterface;

abstract class CommandBase implements CommandInterface
{
    public function __construct(array $data = [])
    {
        foreach ($data as $property => $value) {
            if (\property_exists($this, $property)) {
                $this->{$property} = $value;
            }
        }
    }

    /**
     * @return static
     */
    public static function getCommand(array $data = []): CommandInterface
    {
        return new static($data);
    }

    abstract public function validateCommand(): bool;


}
