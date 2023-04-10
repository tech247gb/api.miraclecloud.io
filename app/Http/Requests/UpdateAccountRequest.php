<?php

namespace App\Http\Requests;

use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\AccountUpdateValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

/**
 * Class AddAccountRequest
 * @package App\Http\Requests
 */
class UpdateAccountRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->get('vendorId') == 1) {

            return $this->getRequestAzure();
        } elseif ($this->get('vendorId') == 2) {

            return $this->getRequestAWS();
        } else {

            return [
                'vendorId' => 'required|integer|in:1,2',
            ];
        }
    }

    private function getRequestAzure()
    {
        return [
            'accountNumber' => 'required|string|max:100',
            'accountName' => 'required|string|max:100',
            'accountId' => 'required|integer',
            'statusId' => 'required|integer|in:1',
            'businessUnitId' => 'required|integer',
            'clientId' => 'required|integer',
            'vendorId' => 'required|integer|in:1,2',
            'subBusinessUnitId' => 'integer',
            'enrollmentId' => 'string|max:400',
            'tenant' => 'required|string|max:45',
            'clientIdKey' => 'required|string|max:45',
            'clientSecret' => 'required|string|max:45',
            'subscriptionId' => 'required|string|max:45',
            'usageDetailsPath' => 'string|max:4000',
            'apiVersion' => 'string|max:45',
        ];
    }

    private function getRequestAWS()
    {
        return [
            'accountNumber' => 'required|string|max:100',
            'accountName' => 'required|string|max:100',
            'accountId' => 'required|integer',
            'statusId' => 'required|integer|in:1',
            'businessUnitId' => 'required|integer',
            'clientId' => 'required|integer',
            'vendorId' => 'required|integer|in:1,2',
            'subBusinessUnitId' => 'integer',
            'enrollmentId' => 'string|max:400',
            'aRN' => 'required|string|max:450',
            'bucketName' => 'required|string|max:45',
        ];
    }

    /**
     * @param Validator $validator
     * @throws AccountUpdateValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new AccountUpdateValidationException(
            ValidationExceptionCodeInterface::ACCOUNT_UPDATE_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }
}
