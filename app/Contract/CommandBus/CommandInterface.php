<?php


namespace App\Contract\CommandBus;

/**
 * Interface CommandInterface
 * @package App\Contract\Core
 */
interface CommandInterface
{
    /**
     * @return CommandInterface
     */
    public static function getCommand(): CommandInterface;
}
