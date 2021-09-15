<?php

namespace App\Http\Requests;

use App\Category;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
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
            'nazwa' => ['required', 'max:64'],
            'cena' => ['required','min:0','max:1000000','numeric'],
            'kategoria' => ['required', Rule::in(Category::pluck('id'))],
            'opis' => ['required'],
            'ilosc' => ['required','min:0','max:10000','numeric' ]
        ];
    }
}
