<?php

declare(strict_types = 1);

namespace App\Http\Requests\Tag;


use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\Tag\TagListValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

/**
 * Class TagValuesByTagKeyRequest
 * @package App\Http\Requests\Tag
 */
class TagValuesByTagKeyRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'tagKey' => 'required|string',
        ];
    }

    /**
     * @param Validator $validator
     * @throws TagListValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new TagListValidationException(
            ValidationExceptionCodeInterface::TAG_VALUES_BY_TAG_KEY,
            $validator->errors()->messages()
        );
    }

}
