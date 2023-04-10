<?php

namespace App\Http\Requests;

use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\DashboardValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

/**
 * Class DashboardRequest
 * @package App\Http\Requests
 */
class DashboardRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'division' => 'arrayInt',
            'provider' => 'arrayInt',
            'month' => 'numeric|in:1,2,3,4,5,6,7,8,9,10,11,12',
            'year' => 'required|numeric',
            'credit' => 'required|boolean',
            '1time' => 'required|boolean',
            'tax' => 'required|boolean',
            'page' => 'integer',
            'per_page' => 'integer',
            'client_id' => 'required|integer',
        ];
    }

    /**
     * @param Validator $validator
     * @throws DashboardValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new DashboardValidationException(
            ValidationExceptionCodeInterface::DASHBOARD_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }
}
