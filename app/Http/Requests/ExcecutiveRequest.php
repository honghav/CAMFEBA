<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExcecutiveRequest extends FormRequest
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
            'name' => 'nullable|string|max:255',
            'file_path' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:100',
        ];
    }
}
