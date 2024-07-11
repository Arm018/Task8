<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyDetailRequest extends FormRequest
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
            'description' => 'nullable|string',
            'building_age' => 'nullable|in:0 - 1 Years,0 - 5 Years,0 - 10 Years,0 - 20 Years,0 - 50 Years,50 + Years',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|integer|min:0',
            'air_conditioning' => 'nullable|boolean',
            'swimming_pool' => 'nullable|boolean',
            'central_heating' => 'nullable|boolean',
            'laundry_room' => 'nullable|boolean',
            'gym' => 'nullable|boolean',
            'alarm' => 'nullable|boolean',
            'window_covering' => 'nullable|boolean',
            'contact_name' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:20',
        ];
    }
}
