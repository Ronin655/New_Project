<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required|string'],
            'last_name' => ['required|string'],
            'second_name' => ['nullable|string|'],
            'sex' => ['required|string'],
            'latitude' => ['required|numeric'],
            'longitude' => ['required|numeric'],
            'status' => ['required|numeric'],
            'date_of_birth' => ['required|date'],
            'date_of_death' => ['nullable|date'],
        ];
    }
}
