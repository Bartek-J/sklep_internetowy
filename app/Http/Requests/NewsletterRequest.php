<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsletterRequest extends FormRequest
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
            'title' => ['required','min:5','max:128'],
            'header' => ['required'],
            'main' => ['required'],
            'przyciskopis' => ['nullable','max:32'],
            'link' => ['nullable','url']
        ];
    }
}
