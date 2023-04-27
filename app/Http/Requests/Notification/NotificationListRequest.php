<?php


namespace App\Http\Requests\Notification;


use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\Notification\NotificationListValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class NotificationListRequest extends FormRequest
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
            'UserID' => 'required|integer'
        ];
    }

    /**
     * @param Validator $validator
     * @throws NotificationListValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new NotificationListValidationException(
            ValidationExceptionCodeInterface::NOTIFICATION_LIST_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }

}
