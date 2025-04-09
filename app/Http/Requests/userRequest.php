<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class userRequest extends FormRequest
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
            'first_name' => 'required|min:3|string|max:25',
            'last_name' => 'required|min:3|string|max:25',
            'email' => 'required|email|unique:users,email',
            'address'=>'required|min:3|max:25|string',
            'city'=>'required|min:3|max:25|string',
            'postal_code'=>'required|min:3|max:25|string',
            'phone'=>'required|min:3|max:25|string',
            'password' => ['required','confirmed',Password::min(8)->mixedCase()->numbers()],
        ];
    }
}
