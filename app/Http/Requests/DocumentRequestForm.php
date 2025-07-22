<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequestForm extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'cover' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif'],
            'file_path' => ['required', 'file', 'mimes:pdf,doc,docx'],
            'published_at' => ['nullable', 'date'],
            'status' => ['required', 'in:free,paid'],
            'legal_category_id' => ['required', 'exists:legal_categories,id'],
        ];
    }
}
