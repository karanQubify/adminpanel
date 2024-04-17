<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TechnologyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Set to true to authorize all users
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $industryId = $this->route('technology');
        if($industryId){
            $iconValidate = 'file|mimes:svg,png';
        }else{
            $iconValidate = 'required|file|mimes:svg,png';
        }
        $rules = [
            'name' => 'required|unique:technologies,name',
            'type' => 'required',
            'description' => 'required',
            'icon' => $iconValidate,
        ];

        return $rules;
    }

    /**
     * Get the validation messages that apply to the request.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.unique' => 'The name has already been taken.',
            'type.required' => 'The type field is required.',
            'description.required' => 'The description field is required.',
            'icon.required' => 'The icon field is required.',
            'icon.file' => 'The icon must be a file.',
            'icon.mimes' => 'Only SVG or PNG files are allowed for the icon.',
        ];
    }
}
