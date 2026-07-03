<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'name' => [
                'required',
                'string',
                'max:100'
            ],

            'email' => [
                'required',
                'email',
                'unique:users,email'
            ],

            'password' => [
                'required',
                'min:6',
                'confirmed'
            ],

        ];
    }

    public function messages(): array
    {
        return [

            'name.required' => 'Please enter your name.',

            'email.required' => 'Please enter email.',

            'email.email' => 'Email is invalid.',

            'email.unique' => 'Email already exists.',

            'password.required' => 'Please enter password.',

            'password.confirmed' => 'Password confirmation does not match.',

            'password.min' => 'Password must be at least 6 characters.'

        ];
    }
}
