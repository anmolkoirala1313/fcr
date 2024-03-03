<?php

namespace App\Http\Requests\Backend\Homepage;

use Illuminate\Foundation\Http\FormRequest;

class SiteStatisticRequest extends FormRequest
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
            'ss_title'              => 'required|string|max:60',
            'ss_description'        => 'nullable|string|max:1145',
            'project_completed'     => 'nullable|numeric',
            'happy_clients'         => 'nullable|numeric',
            'visa_approved'         => 'nullable|numeric',
            'success_stories'       => 'nullable|numeric',
        ];
    }

    public function messages()
    {
        return [
            'ss_title.required'            => 'Please enter title',
            'ss_description.required'      => 'Please enter description',
            'project_completed.required'   => 'Must have a numeric value',
            'visa_approved.required'       => 'Must have a numeric value',
            'happy_clients.required'       => 'Must have a numeric value',
            'success_stories.required'     => 'Must have a numeric value',
        ];
    }
}
