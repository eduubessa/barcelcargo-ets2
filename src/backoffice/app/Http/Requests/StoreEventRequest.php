<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'photo' => [
                'image',
                'mimes:jpeg,png,jpg, gif,svg',
                'max:2048'
            ],
            'title' => [
                'required',
                'max:30'
            ],
            "description" => [
                'required',
                'max:100'
            ],
            "body" => [
                'required',
                'max:3000'
            ],
            "event_at" => [
                'required'
            ]
        ];
    }
}
