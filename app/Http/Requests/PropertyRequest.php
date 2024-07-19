<?php

namespace App\Http\Requests;

use App\Models\Property;
use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'status' => 'required|in:' . implode(',', array_keys(Property::STATUSES)),
            'type' => 'required|in:' . implode(',', array_keys(Property::TYPES)),
            'price' => 'required|numeric|min:0',
            'area' => 'required|integer|min:1',
            'rooms' => 'required|integer|min:1',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip_code' => 'required|string|max:20',
            'expiration_date' => 'required|date',
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'features' => 'array',
            'features.*' => 'exists:features,id'

        ];
    }
}
