<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

    public function rules(): array {
        return [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'unique:users,email'],
            'password' => ['required', 'min:8'],
        ];
    }

    public function messages() {
        return [
            'name.required' => __("validation.required"), 'attribute' => __("message.attributes.name"),
            'name.string' => __("validation.string"), 'attribute' => __("message.attributes.name"),
            'name.max' => __("validation.max.string", ['max' => 50, 'attribute' => __("message.attributes.name")]),

            'email.required' => __("validation.required"), 'attribute' => __("message.attributes.email"),
            'email.string' => __("validation.string"), 'attribute' => __("message.attributes.email"),
            'email.unique' => __("validation.unique"), 'attribute' => __("message.attributes.email"),

            'password.required' => __("validation.required"), 'attribute' => __("message.attributes.password"),
            'password.min' => __("validation.min.string", ['min' => 8, 'attribute' => __("message.attributes.password")]),
        ];
    }
}
