<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name' => 'required|string',
            'title' => 'nullable|string',
            'phone' => 'nullable|integer',
            'about' => 'nullable|string',
            'twitter' => 'nullable|url',
            'facebook' => 'nullable|url',
            'google_plus' => 'nullable|url',
            'linkedin' => 'nullable|url'
        ];
    }
}
