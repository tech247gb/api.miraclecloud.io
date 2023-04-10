<?php

namespace App\Http\Requests;

use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\AccountGetValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

/**
 * Class AccountGetRequest
 * @package App\Http\Requests
 */
class AccountGetRequest extends FormRequest
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
     * @throws AccountGetValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new AccountGetValidationException(
            ValidationExceptionCodeInterface::ACCOUNT_GET_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }
}
