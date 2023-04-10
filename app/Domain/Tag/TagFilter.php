<?php

declare(strict_types = 1);


namespace App\Domain\Tag;

/**
 * Class TagFilter
 * @package App\Domain\Tag
 */
class TagFilter
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var int|null
     */
    private $productId;

    /**
     * @var int|null
     */
    private $entityTypeId;

    /**
     * @var int|null
     */
    private $resourceId;

    /**
     * @var string|null
     */
    private $tagKey;

    /**
     * @return int|null
     */
    public function getProductId(): ?int
    {
        return $this->productId;
    }

    /**
     * @param int|null $productId
     * @return TagFilter
     */
    public function setProductId(?int $productId): self
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getEntityTypeId(): ?int
    {
        return $this->entityTypeId;
    }

    /**
     * @param int|null $entityTypeId
     * @return TagFilter
     */
    public function setEntityTypeId(?int $entityTypeId): self
    {
        $this->entityTypeId = $entityTypeId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getResourceId(): ?int
    {
        return $this->resourceId;
    }

    /**
     * @param int|null $resourceId
     * @return TagFilter
     */
    public function setResourceId(?int $resourceId): self
    {
        $this->resourceId = $resourceId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTagKey(): ?string
    {
        return $this->tagKey;
    }

    /**
     * @param string|null $tagKey
     * @return TagFilter
     */
    public function setTagKey(?string $tagKey): self
    {
        $this->tagKey = $tagKey;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return TagFilter
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

}
