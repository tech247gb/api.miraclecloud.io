<?php


namespace App\Application\Tag\TagList;


use App\Application\Core\CommandBase;

class TagList extends CommandBase
{

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
     * @return TagList
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
     * @return TagList
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
     * @return TagList
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
     * @return TagList
     */
    public function setTagKey(?string $tagKey): self
    {
        $this->tagKey = $tagKey;

        return $this;
    }

    /**
     * @return bool
     */
    public function validateCommand(): bool
    {
        return true;
    }

}
