<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'email' => ["required",'exists:users','regex:/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/'],
            'password' => ["required"],
            'device_name' =>['required','string']
        ];
    }
}
