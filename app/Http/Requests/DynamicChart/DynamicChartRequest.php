<?php


namespace App\Http\Requests\DynamicChart;


use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\DynamicChart\DynamicChartValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

/**
 * Class DynamicChartRequest
 * @package App\Http\Requests\DynamicChart
 */
class DynamicChartRequest extends FormRequest
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
            'clientId' => 'required|integer',
            'startDate' => 'required|date|date_format:Y-m-d',
            'endDate' => 'required|date|date_format:Y-m-d',
            'dateInterval' => 'nullable|date|date_format:Y-m-d',
            'fields' => 'nullable|array|arrayStrings',
            'filters' => 'nullable|array|arrayStrings',
            'page' => 'required|integer',
            'perPage' => 'required|integer',
        ];
    }

    /**
     * @param Validator $validator
     * @throws DynamicChartValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new DynamicChartValidationException(
            ValidationExceptionCodeInterface::DYNAMIC_CHART_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }

}
