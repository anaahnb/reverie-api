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
            'dream_title.required' => ["O campo 'Titulo' é obrigatório"],
            'dream_title.string' => ["O campo 'Titulo' é invalido"],
            'dream_title.max' => ["O campo 'Titulo' ultrapasou a quantidade máxima de caracteres"],

            'dream_description.required' => ["O campo 'Descrição' é obrigatório"],
            'dream_description.string' => ["O campo 'Descrição' é invalido"],

            'mood_id.required' => ["O campo 'Sentimento' é obrigatório"],
            'mood_id.numeric' => ["O campo 'Sentimento' é inválido"],
        ];
    }
}
