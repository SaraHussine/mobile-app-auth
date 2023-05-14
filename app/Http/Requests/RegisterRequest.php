<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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

            'name' => ["required","string" ,"max:255","min:3"],
            'email' => ["required","regex:/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/","unique:users"],
            'password' => ["required","regex:/^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,}$/" ,"confirmed"],
            'password_confirmation' => ["required"],
            'device_name' => ["required","string"],

        ];
    }
}
