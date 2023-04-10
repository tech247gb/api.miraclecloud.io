<?php

declare(strict_types = 1);

namespace App\Application\Tag\TagsByTagKey;


use App\Application\Core\CommandBase;
use App\Contract\Exception\CustomExceptionCodeInterface;
use App\Exceptions\UnprocessableCommandException;

/**
 * Class TagsByTagKey
 * @package App\Application\Tag\TagsByTagKey
 *
 * @property string|null $tagKey
 */
class TagsByTagKey extends CommandBase
{

    /**
     * @var string|null
     */
    private $tagKey;

    /**
     * @return string|null
     */
    public function getTagKey(): ?string
    {
        return $this->tagKey;
    }

    /**
     * @param string|null $tagKey
     * @return TagsByTagKey
     */
    public function setTagKey(?string $tagKey): self
    {
        $this->tagKey = $tagKey;

        return $this;
    }

    /**
     * @return bool
     * @throws UnprocessableCommandException
     */
    public function validateCommand(): bool
    {
        if (is_null($this->tagKey)) {

            throw UnprocessableCommandException::getClass(
                CustomExceptionCodeInterface::TAG_VALUES_BY_TAG_KEY_COMMAND
            );
        }

        return true;
    }
}
