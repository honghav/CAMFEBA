<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QouteRequest extends FormRequest
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
            //
            'name' => 'required|string|max:255',
            'file_path' => 'nullable|file|mimes:jpg,jpeg,png,gif,svg|max:5120',
            'description' => 'nullable|string|max:1000',
            'from' => 'nullable|string|max:255',
        ];
    }
}
