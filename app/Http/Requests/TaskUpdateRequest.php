<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "title" => "required",
            "description" => "required",
            "is_completed"=> "required"
        ];
    }
    public function messages(): array
    {
        return [
            "title" => "Please enter a title",
            "description" => "Please enter a description",
            "is_completed"=> "Please select a completed status"
        ];
    }
}
