<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Top100Request extends FormRequest
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
        $validSlugs = [
            'ação',
            'aventura',
            'animação',
            'clássícos',
            'comédia',
            'crime',
            'drama',
            'família',
            'fantasia',
            'terror',
            'musical',
            'mistério',
            'romance',
            'ficção-científica',
            'suspense',
            'guerra',
            'faroeste',
            'geral',
        ];

        return [
            'top100Name' => ['required', 'string', 'in:'.implode(',', $validSlugs)],
        ];

    }
}
