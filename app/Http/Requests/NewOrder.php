<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewOrder extends FormRequest
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
            'email' => ['email','required'],
            'Name' => ['required','alpha','max:32'],
            'SurName' => ['required','alpha','max:32'],
            'recipientStreet' => ['required','max:64'],
            'recipientCity' => ['required','alpha','max:32'],
            'recipientPostalCode' => ['required','postal_code:PL'],
            'recipientPhoneNumber' => ['required','alpha_num','max:9'],
            'regulamin' => ['accepted'],
            'delieveryMethod' => ['required']
        
        ];
    }
    public function attributes()
    {
        return [
            'Name' => 'Imię',
            'SurName' => 'Nazwisko',
            'recipientStreet' => 'Ulica i numer domu',
            'recipientCity' => 'Miejscowość',
            'recipientPostalCode' => 'Kod pocztowy',
            'recipientPhoneNumber' => 'Numer telefonu',
        ];
    }
}
