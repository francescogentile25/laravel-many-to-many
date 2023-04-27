<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'title' => [
                'required',
                'max:150',
                Rule::unique('projects', 'title')->ignore($this->project)

            ],
            'description' => 'nullable|string',
            'website_link' => 'nullable|url',
            'type_id' => 'nullable|exists:types,id'

        ];
    }
}