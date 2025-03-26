<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productRequest extends FormRequest
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
            'name' => 'required|min:3|max:25',
            'description' => 'required|min:5|max:100',
            'price' => 'required|numeric',
            'quantity' => 'numeric',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categorey_id' => 'required',
            'brand_id' => 'required',
            'discount' => 'nullable',
        ];
    }
}
