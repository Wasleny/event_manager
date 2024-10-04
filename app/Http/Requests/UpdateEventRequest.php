<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $unique_name = $this->old_name === $this->name ? '' : 'unique:events';

        return [
            'name' => "required|$unique_name",
            'location' => 'required',
            'start_datetime' => 'required|date|date_format:Y-m-d\TH:i',
            'end_datetime' => 'required|date|date_format:Y-m-d\TH:i|after:start_datetime',
            'maximum_capacity' => 'required|min:1',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
