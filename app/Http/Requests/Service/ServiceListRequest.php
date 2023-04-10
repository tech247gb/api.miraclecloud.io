<?php


namespace App\Http\Requests\Service;


use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\Service\ServiceListValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class ServiceListRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'clientId' => 'required|integer',
        ];
    }

    /**
     * @param Validator $validator
     * @throws ServiceListValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new ServiceListValidationException(
            ValidationExceptionCodeInterface::SERVICE_LIST_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }
}
