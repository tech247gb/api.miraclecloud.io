<?php

declare(strict_types=1);

namespace App\Infrastructure\Helper\Request\Configure;

class RequestConfigure
{
    public $trim;

    public $castFields;

    public $defaultValues;

    public $toUTF8;

    public function __construct(
        bool $trim = false,
        array $castFields = [],
        array $defaultValues = [],
        bool $toUTF8 = false
    ) {
        $this->trim = $trim;
        $this->castFields = $castFields;
        $this->defaultValues = $defaultValues;
        $this->toUTF8 = $toUTF8;
    }
}
