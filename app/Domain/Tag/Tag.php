<?php


namespace App\Domain\Tag;


class Tag
{

    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $key;

    /**
     * @var string|null
     */
    private $value;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Tag
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * @param string|null $key
     * @return Tag
     */
    public function setKey(?string $key): self
    {
        $this->key = $key;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string|null $value
     * @return Tag
     */
    public function setValue(?string $value): self
    {
        $this->value = $value;

        return $this;
    }

}
