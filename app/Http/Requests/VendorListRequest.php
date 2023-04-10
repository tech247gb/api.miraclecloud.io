<?php

namespace App\Http\Requests;

use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\VendorListValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

/**
 * Class SubBusinessUnitRequest
 * @package App\Http\Requests
 */
class VendorListRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'clientId' => 'numeric'
        ];
    }

    /**
     * @param Validator $validator
     * @throws VendorListValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new VendorListValidationException(
            ValidationExceptionCodeInterface::VENDOR_LIST_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }
}
