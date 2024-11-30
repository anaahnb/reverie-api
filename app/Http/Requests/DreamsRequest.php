<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DreamsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'dream_title' => ['required', 'string', 'max:50', 'unique:dreams,dream_title'],
            'dream_description' => ['required', 'string'],
            'mood_id' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'dream_title.required' => __("validation.required"),
            'dream_title.string' => __("validation.string"),
            'dream_title.max' => __("validation.max.string", ['max' => 50]),

            'dream_description.required' => __("validation.required"),
            'dream_description.string' => __("validation.string"),

            'mood_id.required' => __("validation.required"),
            'mood_id.numeric' => __("validation.numeric"),
        ];
    }
}
