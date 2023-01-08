<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSystemServicesRequest extends FormRequest
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
            'price' => 'required', 'string', 'min:3', 'max:2000',
            'route' => 'required', 'string', 'min:3', 'max:2000',
            
        ];
    }

    public function messages()
    {
        return [
            "title.required" => "لم يتم ادخال الاسم",
            "title.max" => "يجب أن لا يزيد طول النص عن 30 حرف",
            "price.required" => "لم يتم ادخال السعر",
            "price.max" => "هذا النص طويل للغاية",
            "route.required" => "لم يتم ادخال الراوت",
            "route.max" => "هذا النص طويل للغاية",
            "image.required" => "لم يتم ادخال صورة",
            'min' => 'يجب ان يزيد طول النص عن 3',
           
        ];
    }
}
