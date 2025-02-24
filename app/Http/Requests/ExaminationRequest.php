<?php

namespace App\Http\Requests;

use App\Models\Examiner;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ExaminationRequest extends FormRequest
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
    public function rules()
{
    $examId = $this->route('examination');

    return [
        'exam_name' => [
            'required',
            'max:255',
            Rule::unique('examinations')->ignore($examId)
        ],
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'start_time' => 'required',
        'end_time' => [
            'required',
            function ($attribute, $value, $fail) {
                $startDate = $this->input('start_date');
                $endDate = $this->input('end_date');
                $startTime = $this->input('start_time');

                if ($startDate === $endDate && strtotime($value) <= strtotime($startTime)) {
                    $fail('The end time must be after the start time if the start and end dates are the same.');
                }
            },
        ],
    ];
}

    
}
