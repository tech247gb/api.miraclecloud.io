<?php

namespace App\Http\Requests;

use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\LoginValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

/**
 * Class DashboardRequest
 * @package App\Http\Requests
 */
class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|string',
            'password' => 'required|string',
        ];
    }

    /**
     * @param Validator $validator
     * @throws LoginValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new LoginValidationException(
            ValidationExceptionCodeInterface::LOGIN_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }
}
