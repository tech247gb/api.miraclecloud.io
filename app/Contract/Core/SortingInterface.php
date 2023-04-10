<?php

namespace App\Contract\Core;

/**
 * Class SortingInterface
 * @package App\Contract\Core
 */
interface SortingInterface
{
    /**
     * @return string
     */
    public function getField(): string;

    /**
     * @return string
     */
    public function getDirection(): string;
}
