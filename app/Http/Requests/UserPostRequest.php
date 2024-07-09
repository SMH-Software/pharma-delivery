<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPostRequest extends FormRequest
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
            'firstname' => ['required', 'min:4'],
            /* 'lastname' => ['sometimes', 'min:4'], */
            'lastname' => ['required', 'min:4'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric', 'min:8'],
            'address' => ['required', 'min:4'],
            'password' => ['required', 'min:4', 'regex:/^[A-Za-z0-9@#$%^&*()_]+$/'],
        ];
    }
}
