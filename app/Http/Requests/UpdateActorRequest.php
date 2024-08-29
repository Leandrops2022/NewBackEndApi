<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActorRequest extends FormRequest
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
            'name'                 => 'nullable|string|max:255',
            'profile_path'         => 'nullable|string|max:255',
            'place_of_birth'       => 'nullable|string|max:255',
            'popularity'           => 'nullable|numeric',
            'tmdb_id'              => 'nullable|string|max:255',
            'adult'                => 'nullable|boolean',
            'also_known_as'        => 'nullable|string|max:255',
            'biography'            => 'nullable|string',
            'birthday'             => 'nullable|date_format:Y-m-d',
            'deathday'             => 'nullable|date_format:Y-m-d',
            'gender'               => 'nullable|string|max:50',
            'homepage'             => 'nullable|url',
            'imdb_id'              => 'nullable|string|max:255',
            'known_for_department' => 'nullable|string|max:255',
        ];
    }
}
