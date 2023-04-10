<?php

namespace App\Http\Requests;

use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\AccountValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

/**
 * Class AccountRequest
 * @package App\Http\Requests
 */
class AccountRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'accountId' => 'required|integer',
        ];
    }

    /**
     * @param Validator $validator
     * @throws AccountValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new AccountValidationException(
            ValidationExceptionCodeInterface::ACCOUNT_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }
}
