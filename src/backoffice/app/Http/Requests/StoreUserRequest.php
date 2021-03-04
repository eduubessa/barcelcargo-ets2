<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name' => 'required|string|min:3|max:50',
            'username' => 'required|string|min:3|max:30|unique:users',
            'email' => 'required|email|min:3|max:100|unique:users',
            'password' => 'required|string|min:5|max:100|confirmed'
        ];
    }
}
