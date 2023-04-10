<?php


namespace App\Http\Requests\Frequency;


use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\Frequency\FrequencyShowByAlertTypeIdValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class FrequencyShowByAlertTypeIdRequest extends FormRequest
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
            'alertTypeId' => 'required|integer',
        ];
    }

    /**
     * @param Validator $validator
     * @throws FrequencyShowByAlertTypeIdValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new FrequencyShowByAlertTypeIdValidationException(
            ValidationExceptionCodeInterface::FREQUENCY_SHOW_BY_ALERT_TYPE_ID,
            $validator->errors()->messages()
        );
    }

}
