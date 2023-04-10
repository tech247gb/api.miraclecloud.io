<?php


namespace App\Http\Controllers;


use App\Application\Tag\TagList\TagList;
use App\Application\Tag\TagShow\TagShow;
use App\Application\Tag\TagsByTagKey\TagsByTagKey;
use App\Contract\CommandBus\CommandBusInterface;
use App\Http\Requests\Tag\TagListRequest;
use App\Http\Requests\Tag\TagValuesByTagKeyRequest;
use App\Infrastructure\Response\Tag\TagListResponse;
use App\Infrastructure\Response\Tag\TagResponse;
use App\Infrastructure\Response\Tag\TagsByTagKeyResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class TagController
 * @package App\Http\Controllers
 *
 * @group Tags
 */
class TagController extends Controller
{

    /**
     * TagController constructor.
     * @param CommandBusInterface $commandBus
     */
    public function __construct(CommandBusInterface $commandBus)
    {
        parent::__construct($commandBus);
    }

    /**
     * Tag list
     *
     * @queryParam productId integer, Product id
     * @queryParam entityTypeId integer, EntityType id
     * @queryParam resourceId integer, Resource id
     * @queryParam tagKey string, Tag key
     *
     * @responseFile 200 responses/tagList.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param TagListRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function all(TagListRequest $request)
    {

        try {

            $command = TagList::getCommand();
            $command->setProductId($request->get('productId'));
            $command->setEntityTypeId($request->get('entityTypeId'));
            $command->setResourceId($request->get('resourceId'));
            $command->setTagKey($request->get('tagKey'));

            return new JsonResponse(new TagListResponse($this->process($command)), Response::HTTP_OK);

        } catch (Exception $exception) {

            throw $exception;
        }

    }

    /**
     * Tags by tag key
     *
     * @bodyParam tagKey string required Related Tag key
     *
     * @responseFile 200 responses/tagsByTagKey.json
     * @responseFile 401 responses/unauthorized.json
     * @responseFile 422 responses/validationError.json
     *
     * @param TagValuesByTagKeyRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function readByTagKey(TagValuesByTagKeyRequest $request)
    {
        try {

            $command = TagsByTagKey::getCommand();
            $command->setTagKey($request->get('tagKey'));

            return new JsonResponse(new TagsByTagKeyResponse($this->process($command)), Response::HTTP_OK);

        } catch (Exception $exception) {

            throw $exception;
        }
    }

}
