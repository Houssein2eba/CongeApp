<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class StoreCongeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'start_date' => [
                'required',
                'date',
                'after_or_equal:today',
                function ($attr, $value, $fail) {
                    $daysRequested = Carbon::parse($value)
                        ->diffInDaysFiltered(
                            fn($date) => !$date->isWeekend(),
                            Carbon::parse($this->end_date)
                        ) + 1;
                    
                    if ($daysRequested > auth()->user()->available_leave_days) {
                        $fail("Solde insuffisant ({$daysRequested} jours demandés)");
                    }
                }
            ],
            'end_date' => 'required|date|after_or_equal:start_date',
            'type' => 'required|in:'.implode(',', array_keys(config('leave.types'))),
            'notes' => 'nullable|string|max:500'
        ];
    }

    public function messages()
    {
        return [
            'start_date.after_or_equal' => 'La date doit être future',
            'end_date.after_or_equal' => 'Doit être après la date de début'
        ];
    }
}