<?php

namespace App\Http\Requests;

use Urameshibr\Requests\FormRequest;

/**
 * Class SsoLoginRequest
 * @package App\Http\Requests
 */
class SsoLoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
    }
}
