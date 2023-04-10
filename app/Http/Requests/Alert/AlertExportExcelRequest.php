<?php


namespace App\Http\Requests\Alert;


use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\Alert\AlertExportExcelValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class AlertExportExcelRequest extends FormRequest
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
            'alertIds' => 'required|array',
            'alertIds.*' => 'integer'
        ];
    }

    /**
     * @param Validator $validator
     * @throws AlertExportExcelValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new AlertExportExcelValidationException(
            ValidationExceptionCodeInterface::ALERT_EXPORT_EXCEL_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }

}
