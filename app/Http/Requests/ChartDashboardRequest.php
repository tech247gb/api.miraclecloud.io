<?php

namespace App\Http\Requests;

use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\ChartDashboardValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

/**
 * Class ChartDashboardRequest
 * @package App\Http\Requests
 */
class ChartDashboardRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'year' => 'required|numeric',
            'client_id' => 'required|numeric',
            'credit' => 'boolean',
            'oneTime' => 'boolean',
            'tax' => 'required|boolean',
            'businessUnitId' => 'integer',
            'vendorId' => 'integer|in:1,2',
        ];
    }

    /**
     * @param Validator $validator
     * @throws ChartDashboardValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new ChartDashboardValidationException(
            ValidationExceptionCodeInterface::CHART_DASHBOARD_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }
}
