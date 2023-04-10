<?php


namespace App\Http\Requests\Source;


use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\Source\SourceListValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class SourceListRequest extends FormRequest
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
     * @throws SourceListValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new SourceListValidationException(
            ValidationExceptionCodeInterface::SOURCE_LIST_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }

}
