<?php

namespace App\Http\Requests;

use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\YearListValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

/**
 * Class YearListRequest
 * @package App\Http\Requests
 */
class YearListRequest extends FormRequest
{
    protected $clientId;


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
     * @throws YearListValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new YearListValidationException(
            ValidationExceptionCodeInterface::YEAR_LIST_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }
}
