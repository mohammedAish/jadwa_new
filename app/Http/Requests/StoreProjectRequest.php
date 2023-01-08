<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProjectRequest extends FormRequest
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
            //
            'name' => 'required',     
            'idea' => 'required',
            'logo' =>  'required',
            'country' => 'required',
            'city' => 'required',
            'start_date' => 'required',
            'development_duration' => 'required',
            'number_days_year' => 'required',
            'vat' => 'required',
            'currency' => 'required',
            'study_duration' => 'required',
            'owner_id' => 'required',
            'project_type_id' => 'required',
            'created_by' => 'numeric',
        ];
    }
}
