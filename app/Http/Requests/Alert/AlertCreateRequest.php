<?php


namespace App\Http\Requests\Alert;


use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\Alert\AlertCreateValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class AlertCreateRequest extends FormRequest
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
            'alertName' => 'required|string',
            'alertTypeId' => 'required|integer',
            'alertSourceId' => 'required|integer',
            'productId' => 'nullable|integer',
            'entityTypeId' => 'nullable|integer',
            'entityId' => 'nullable|integer',
            'tagKey' => 'nullable|string',
            'tagValue' => 'nullable|string',
            'comparisonTypeId' => 'nullable|integer',
            'percentageOfComparison' => 'nullable|integer',
            'withinMonth' => 'nullable|integer',
            'withinDay' => 'nullable|integer',
            'condition' => 'nullable|string',
            'ownerId' => 'required|integer',
            'emailCC' => 'array|max:10',
            'emailCC.*' => 'email',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'emailCC.max' => 'The Email CC accepts up to 10 emails',
            'emailCC.*' => 'The Email CC must be an array of email values',
        ];
    }

    /**
     * @param Validator $validator
     * @throws AlertCreateValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new AlertCreateValidationException(
            ValidationExceptionCodeInterface::ALERT_CREATE_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }

}
