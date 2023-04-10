<?php


namespace App\Http\Requests\DashboardTable;


use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\DashboardTable\DashboardTableValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class DashboardTableRequest extends FormRequest
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
     * @throws DashboardTableValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new DashboardTableValidationException(
            ValidationExceptionCodeInterface::DASHBOARD_TABLE_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }

}
