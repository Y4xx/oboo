<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Type_employe extends FormRequest
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
            'type_employ' => 'required|string',
            'heure_travaille' => 'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'type_employ.required' => 'Vous devez fournir le type employer',
            'heure_travaille.required' => 'Vous devez fournir heure de travaille par jour',
        ];
    }
}
