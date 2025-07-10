<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
        'title'          => 'required|string|max:255',
        'description'    => 'required|string',
        'cover'          => 'nullable|string', // Or 'nullable|image' if it's a file later
        'start_date'     => 'required|date',
        'location'       => 'nullable|string',
        'price'          => 'nullable|numeric',
        'start_time'      => 'nullable|date_format:H:i',
        'end_time'       => 'nullable|date_format:H:i|after_or_equal:sart_time',
        'register_link'  => 'required|url',
        'end_register'   => 'nullable|date|after_or_equal:start_date',
    ];
    }
}
