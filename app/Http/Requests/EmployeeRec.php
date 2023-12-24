<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRec extends FormRequest
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
            'numTel' => 'required|numeric|digits:10',
            'fullname' => 'required',
            'idtype_employer' => 'required',
            'email' => 'required|email',
            'salaire' => 'required|numeric',
            'nbjourconge' => 'required|numeric',
            'photo_profile'=> 'image|mimes:png,jpg,jpeg|max:8000'
            
        ];
    }
    public function messages()
    {
        return [
            'numTel.required' => 'Vous devez fournir le numéro de téléphone',
            'numTel.digits' => 'le numéro de téléphone doit étre 10 numéro',
            'fullname.required' => 'Vous devez fournir le nom compléte ',
            'salaire.required' => 'Vous devez fournir le salaire ',
            'salaire.numeric' => 'le salaire doit étre number',
            'nbjourconge.required' => 'Vous devez fournir le nombre de congé',
        ];
    }
}
