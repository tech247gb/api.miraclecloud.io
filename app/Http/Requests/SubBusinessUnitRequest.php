<?php

namespace App\Http\Requests;

use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\SubBusinessUnitValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

/**
 * Class SubBusinessUnitRequest
 * @package App\Http\Requests
 */
class SubBusinessUnitRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'businessUnitId' => 'numeric',
            'status' => 'nullable|in:1,5'
        ];
    }

    /**
     * @param Validator $validator
     * @throws SubBusinessUnitValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new SubBusinessUnitValidationException(
            ValidationExceptionCodeInterface::SUB_BUSINESS_UNIT_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }
}
