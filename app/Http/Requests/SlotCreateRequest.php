<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlotCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, string>
     */
    public function rules()
    {
        return [
            'date' => 'required|date_format:Y-m-d|after_or_equal:now',
            'time' => 'required|date_format:H:i',
            'duration' => 'required|integer',
        ];
    }
}
