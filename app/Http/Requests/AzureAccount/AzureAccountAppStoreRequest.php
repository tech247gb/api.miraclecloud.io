<?php

namespace App\Http\Requests\AzureAccount;

use Urameshibr\Requests\FormRequest;

class AzureAccountAppStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tenant' => 'required|string|max:45',
            'clientIdKey' => 'required|string|max:45',
            'clientSecret' => 'required|string|max:45',
            'subscriptionId' => 'required|string|max:45',
            'listAccountIds' => 'required|array',
        ];
    }
}
