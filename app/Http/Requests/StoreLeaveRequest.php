<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeaveRequest extends FormRequest
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
            'leave_id'          => 'required',
            'start_date'        => 'required',
            'start_half_type'   => 'required',
            'end_date'          => 'required|after_or_equal:start_date',
            'end_half_type'     => 'required',
            'reason'            => 'required',
        ];
    }
}
