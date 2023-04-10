<?php


namespace App\Http\Requests\Vendor;


use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\VendorListValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

/**
 * Class VendorListRequest
 * @package App\Http\Requests\Vendor
 */
class VendorListRequest extends FormRequest
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
        ];
    }

    /**
     * @param Validator $validator
     * @throws VendorListValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new VendorListValidationException(
            ValidationExceptionCodeInterface::VENDOR_LIST_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }

}
