<?php


namespace App\Http\Requests\BusinessUnit;


use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\BusinessUnit\BusinessUnitUpdateValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

/**
 * Class BusinessUnitUpdateRequest
 * @package App\Http\Requests\BusinessUnit
 */
class BusinessUnitUpdateRequest extends FormRequest
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
            'businessUnitName' => 'required|string|max:1000',
        ];
    }

    /**
     * @param Validator $validator
     * @throws BusinessUnitUpdateValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new BusinessUnitUpdateValidationException(
            ValidationExceptionCodeInterface::BUSINESS_UNIT_UPDATE_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }

}
