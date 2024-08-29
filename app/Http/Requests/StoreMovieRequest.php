<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            'id'                => 'required|integer|unique:movies,id',
            'adult'             => 'required|boolean',
            'genre_1'           => 'nullable|exists:genres,id',
            'genre_2'           => 'nullable|exists:genres,id',
            'genre_3'           => 'nullable|exists:genres,id',
            'backdrop_path'     => 'nullable|string|max:255',
            'homepage'          => 'nullable|url|max:255',
            'imdb_id'           => 'nullable|string|max:255|unique:movies,imdb_id',
            'origin_country'    => 'nullable|string|max:255',
            'original_title'    => 'nullable|string|max:255',
            'original_language' => 'nullable|string|max:10',
            'overview'          => 'nullable|string',
            'poster_path'       => 'nullable|string|max:255',
            'tagline'           => 'nullable|string|max:255',
            'title'             => 'nullable|string|max:255',
            'status'            => 'nullable|string|max:255',
            'runtime'           => 'nullable|integer|min:0',
            'budget'            => 'nullable|numeric|min:0',
            'popularity'        => 'nullable|numeric|min:0',
            'revenue'           => 'nullable|numeric|min:0',
            'release_date'      => 'nullable|date',
            'vote_average'      => 'nullable|numeric|min:0|max:10',
            'vote_count'        => 'nullable|integer|min:0',
        ];
    }
}
