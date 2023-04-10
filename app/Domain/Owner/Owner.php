<?php


namespace App\Domain\Owner;


class Owner
{

    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $fullName;

    /**
     * @var string|null
     */
    private $email;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Owner
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * @param string|null $fullName
     * @return Owner
     */
    public function setFullName(?string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return Owner
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

}
