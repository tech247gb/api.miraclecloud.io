<?php


namespace App\Http\Requests\Tag;


use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\Tag\TagListValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class TagListRequest extends FormRequest
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
            'productId' => 'nullable|integer',
            'entityTypeId' => 'nullable|integer',
            'resourceId' => 'nullable|integer',
            'tagKey' => 'nullable|string',
        ];
    }

    /**
     * @param Validator $validator
     * @throws TagListValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new TagListValidationException(
            ValidationExceptionCodeInterface::TAG_LIST_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }

}
