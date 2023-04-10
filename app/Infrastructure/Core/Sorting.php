<?php

namespace App\Infrastructure\Core;

use App\Contract\Core\SortingInterface;

/**
 * Class Sorting
 * @package App\Infrastructure\Core
 */
class Sorting implements SortingInterface
{
    /** @var string $field */
    private $field;

    /** @var string $direction */
    private $direction;

    /**
     * Sorting constructor.
     * @param string $field
     * @param string $direction
     */
    public function __construct(string $field = 'id', string $direction = 'desc')
    {
        $this->field = $field;
        $this->direction = $direction;
    }

    /**
     * @return string
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * @return string
     */
    public function getDirection(): string
    {
        return $this->direction;
    }

}
