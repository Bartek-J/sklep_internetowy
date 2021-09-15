<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewCoupon extends FormRequest
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
            'nazwa' => ['required','max:32','alpha_dash'],
            'ilosc' => ['required','alpha_num','max:32'],
            'discount' => ['required','max:32'],
            'type' => ['required'],
            'expires' => ['required','date','after:today']    
        ];
    }
}
