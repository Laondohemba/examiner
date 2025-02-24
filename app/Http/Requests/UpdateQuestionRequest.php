<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionRequest extends FormRequest
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
            'type' => ['required'],
            'question' => ['required', 'max:500'],
            'option_one' => ['sometimes'],
            'option_two' => ['sometimes'],
            'option_three' => ['sometimes'],
            'option_four' => ['sometimes'],
            'option_five' => ['sometimes'],
            'answer' => ['required'],
            'marks' => ['required'],
        ];
    }
}
