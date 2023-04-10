<?php

namespace App\Domain;

/**
 * Class Client
 * @package App\Domain
 */
class BaseModel
{
    /**
     * @return array
     */
    public function mapAttr(): array
    {
        return [];
    }

    /**
     * @param array $params
     * @return static
     */
    public function load(array $params)
    {
        foreach ($params as $key => $param) {
            $this->setAttribute($key, $param);
        }

        return $this;
    }

    /**
     * @param $mapName
     * @return mixed|string
     */
    protected function getModelAttr($mapName)
    {
        return $this->mapAttr()[$mapName] ?? '';
    }

    /**
     * @param $name
     * @param $value
     */
    protected function setAttribute($name, $value)
    {
        if ($attr = $this->getModelAttr($name)) {
            $this->$attr = $value;
        }
    }
}
