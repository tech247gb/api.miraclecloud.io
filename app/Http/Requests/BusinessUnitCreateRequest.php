<?php


namespace App\Http\Requests;


use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\BusinessUnit\BusinessUnitCreateValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

/**
 * Class BusinessUnitCreateRequest
 * @package App\Http\Requests
 */
class BusinessUnitCreateRequest extends FormRequest
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
            'businessUnitName' => 'required|string|max:1000',
        ];
    }

    /**
     * @param Validator $validator
     * @throws BusinessUnitCreateValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new BusinessUnitCreateValidationException(
            ValidationExceptionCodeInterface::BUSINESS_UNIT_CREATE_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }

}
