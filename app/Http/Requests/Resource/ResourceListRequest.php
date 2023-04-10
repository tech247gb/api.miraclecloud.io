<?php


namespace App\Http\Requests\Resource;


use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\Resource\ResourceListValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class ResourceListRequest extends FormRequest
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
            'clientId' => 'required|integer',
        ];
    }

    /**
     * @param Validator $validator
     * @throws ResourceListValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new ResourceListValidationException(
            ValidationExceptionCodeInterface::RESOURCE_LIST_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }

}
