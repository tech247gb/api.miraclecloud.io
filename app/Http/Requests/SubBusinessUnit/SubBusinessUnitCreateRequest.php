<?php


namespace App\Http\Requests\SubBusinessUnit;


use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\SubBusinessUnit\SubBusinessUnitCreateValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

/**
 * Class SubBusinessUnitCreateRequest
 * @package App\Http\Requests\SubBusinessUnit
 */
class SubBusinessUnitCreateRequest extends FormRequest
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
            'businessUnitId' => 'required|integer',
            'subBusinessUnitName' => 'required|string|max:1000',
        ];
    }

    /**
     * @param Validator $validator
     * @throws SubBusinessUnitCreateValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new SubBusinessUnitCreateValidationException(
            ValidationExceptionCodeInterface::SUB_BUSINESS_UNIT_CREATE_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }


}
