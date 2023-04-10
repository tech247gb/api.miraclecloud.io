<?php


namespace App\Http\Requests\Owner;


use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\Owner\OwnerListValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class OwnerListRequest extends FormRequest
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
     * @throws OwnerListValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new OwnerListValidationException(
            ValidationExceptionCodeInterface::OWNER_LIST_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }

}
