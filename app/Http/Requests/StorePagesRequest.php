<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePagesRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required', 'string', 'min:3', 'max:30',
            'content' => 'required', 'string', 'min:8', 'max:2000',
            'type' =>'required',
            'key' => 'required',
        ];
    }

    public function messages()
    {
        return [
            "title.required" => "لم يتم ادخال العنوان",
            "content.required" => "لم يتم ادخال المحتوى",
            "type.required" => "لم يتم ادخال النوع",
            "key.required" => "لم يتم ادخال النص",
        ];
    }
}
