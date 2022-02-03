<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'date' => ['required', 'integer'],
            // 'time' => ['required', 'integer'],
            'total_number' => ['required', 'integer'],
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '日付を入力してください',
            'date.integer' => '数値で入力してください',
            // 'time.required' => '時間を',
            // 'time.integer' => '数値で入力してください',
            'total_number.required' => '人数を入力してください',
            'total_number.integer' => '数値で入力してください',
        ];
    }
}
