<?php


namespace App\Http\Requests\Alert;


use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\Alert\AlertServiceListValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class AlertServiceListRequest extends FormRequest
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
            'productId' => 'required|integer',
        ];
    }

    /**
     * @param Validator $validator
     * @throws AlertServiceListValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new AlertServiceListValidationException(
            ValidationExceptionCodeInterface::ALERT_SERVICE_LIST_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }

}
