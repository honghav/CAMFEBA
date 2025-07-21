<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberFormRequest extends FormRequest
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
            'company_name' => 'required|string|max:255|unique:member_details,company_name,' . $this->id,
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'status' => 'required|in:Active,Unactive',
            'payment_date' => 'nullable|date',
            'expire_date' => 'nullable|date|after:payment_date',
            'industry' => 'nullable|string|max:255',
            'user_id' => 'nullable|exists:users,id'
        ];
    }
}
