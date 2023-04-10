<?php

namespace App\Http\Requests;

use Urameshibr\Requests\FormRequest;

/**
 * Class ClientByIdRequest
 * @package App\Http\Requests
 */
class LoadClientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'clientname' => 'required|string|max:100',
        ];
    }
}
