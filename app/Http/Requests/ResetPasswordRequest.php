<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'email'                    => 'required|email',
            'password'                 => ['required',
                'string',
                'confirmed',
                'min:6',
                'regex:/[A-Z]/', // At least one uppercase letter
                'regex:/[!@#$%^&*(),.?":{}|<>]/'],
            'password_confirmation'    => 'required|string',
            'token'                    => 'required|string',
        ];
    }
}
