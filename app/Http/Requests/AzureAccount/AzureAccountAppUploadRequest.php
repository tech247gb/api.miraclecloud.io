<?php

namespace App\Http\Requests\AzureAccount;

use Urameshibr\Requests\FormRequest;

class AzureAccountAppUploadRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'file' => 'required|mimes:txt,csv,xlx,xls,xlsx|max:2048',
        ];
    }
}
