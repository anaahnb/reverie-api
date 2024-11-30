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
            'dream_title.required' => __("validation.required"), 'attribute' => __("message.attributes.dream_title"),
            'dream_title.string' => __("validation.string"), 'attribute' => __("message.attributes.dream_title"),
            'dream_title.max' => __("validation.max.string", ['max' => 50, 'attribute' => __("message.attributes.dream_title")]),

            'dream_description.required' => __("validation.required"), 'attribute' => __("message.attributes.dream_description"),
            'dream_description.string' => __("validation.string"), 'attribute' => __("message.attributes.dream_description"),

            'mood_id.required' => __("validation.required"), 'attribute' => __("message.attributes.mood_id"),
            'mood_id.numeric' => __("validation.numeric"), 'attribute' => __("message.attributes.mood_id"),
        ];
    }
}
