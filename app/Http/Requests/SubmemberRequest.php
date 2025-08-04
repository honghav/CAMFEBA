<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmemberRequest extends FormRequest
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
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255',],
            'phone'     => ['nullable', 'string', 'max:20'], // adjust max as needed
            'password'  => ['nullable', 'string', 'min:8'], // add 'confirmed' if you have password confirmation
            'image'     => ['nullable', 'string', 'max:255'], // or use 'image' if it's a file upload
            'is_active' => ['nullable', 'in:0,1'],
            'user_id'   => ['required', 'exists:users,id'],
        ];
    }
}
