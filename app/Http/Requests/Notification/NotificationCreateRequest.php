<?php


namespace App\Http\Requests\Notification;


use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\Notification\NotificationCreateValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class NotificationCreateRequest extends FormRequest
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
            'UserID' => 'required|integer',
            'NotificationTitle' => 'required|string',
            'NotificationType' => 'required|integer',
            'AddedBy' => 'required|integer',
            'Seen' => 'nullable|boolean',
            'entityTypeId' => 'nullable|integer',
            'redirecturl' => 'nullable|integer',
    
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
     * @throws NotificationCreateValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new NotificationCreateValidationException(
            ValidationExceptionCodeInterface::NOTIFICATION_CREATE_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }

}
