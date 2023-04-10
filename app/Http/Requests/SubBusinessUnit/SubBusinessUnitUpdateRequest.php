<?php


namespace App\Http\Requests\SubBusinessUnit;


use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\SubBusinessUnit\SubBusinessUnitUpdateValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

/**
 * Class SubBusinessUnitUpdateRequest
 * @package App\Http\Requests\SubBusinessUnit
 */
class SubBusinessUnitUpdateRequest extends FormRequest
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
            'subBusinessUnitName' => 'required|string|max:1000',
        ];
    }

    /**
     * @param Validator $validator
     * @throws SubBusinessUnitUpdateValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new SubBusinessUnitUpdateValidationException(
            ValidationExceptionCodeInterface::SUB_BUSINESS_UNIT_UPDATE_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }

}
