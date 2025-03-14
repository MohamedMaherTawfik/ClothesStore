<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class orderRequest extends FormRequest
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
            'discount' => 'numeric',
            'taxes' => 'numeric',
            'coupon_code'=>'string',
            'notes'=>'string|min:3|max:100',
            'carrier'=>'string|min:3|max:40',
        ];
    }
}
