<?php

namespace App\Http\Requests;

use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\AccountListValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

/**
 * Class AccountListRequest
 * @package App\Http\Requests
 */
class AccountListRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'clientId' => 'required|integer',
        ];
    }

    /**
     * @param Validator $validator
     * @throws AccountListValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new AccountListValidationException(
            ValidationExceptionCodeInterface::ACCOUNT_LIST_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }
}
