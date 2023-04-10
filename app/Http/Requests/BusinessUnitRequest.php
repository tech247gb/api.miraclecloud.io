<?php

namespace App\Http\Requests;

use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\BusinessUnitValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

/**
 * Class BusinessUnitRequest
 * @package App\Http\Requests
 */
class BusinessUnitRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'bu_name' => 'string',
            'bu_id' => 'numeric',
            'clientId' => 'numeric',
            'status' => 'nullable|in:1,5'
        ];
    }

    /**
     * @param Validator $validator
     * @throws BusinessUnitValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new BusinessUnitValidationException(
            ValidationExceptionCodeInterface::BUSINESS_UNIT_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }
}
