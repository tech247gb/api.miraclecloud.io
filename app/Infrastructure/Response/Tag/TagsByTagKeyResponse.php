<?php

declare(strict_types = 1);

namespace App\Infrastructure\Response\Tag;


use App\Domain\Tag\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

/**
 * Class TagsByTagKeyResponse
 * @package App\Infrastructure\Response\Tag
 */
class TagsByTagKeyResponse extends JsonResource
{
    /**
     * @var Collection|null
     */
    public $resource;

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->resource->map(function (Tag $tag) {

                return [
                    'id' => $tag->getId(),
                    'key' => $tag->getKey(),
                    'value' => $tag->getValue()
                ];
            })
        ];
    }

}
