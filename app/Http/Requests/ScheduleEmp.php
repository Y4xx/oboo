<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleEmp extends FormRequest
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
        // return [
        //     'slug' => 'required|string|min:3|max:32|alpha_dash',
        //     'time_in' => 'required|date_format:H:i|before:time_out',
        //     'time_out' => 'required|date_format:H:i',
        // ];
        return [
            'name' => 'required|string|unique:systeme_de_travail,name',
            'debuMatain' => 'required|before:finMatain',
            'finMatain' => 'required|before:debutMedi|after:debuMatain',
            'debutMedi' => 'required|before:finMedi|after:finMatain',
            'finMedi' => 'required|after:debuMedi',
            'nbConge' => 'required|numeric',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Vous devez fournir le nom de ce systeme',
            'name.unique' => 'ce nom de systeme deja existe changer le',
            'debuMatain.required' => 'Vous devez fournir le temps de debut de travaile  Matin',
            'debuMatain.before'=>'Entrer un temps avant le temps de fin de Matin',

            'finMatain.required' => 'Vous devez fournir le temps de fin Matin',
            'finMatain.before'=>'Entrer le temps de fin Matin avant le temps de debut Medi',
            'finMatain.after'=>'Entrer un temps de fin Matin aprés le temps de debut de Matin',

            'debutMedi.required' => 'Vous devez fournir le temps de debut Medi',
            'debutMedi.before'=>'Entrer le temps de debut Medi avant le temps de fin Medi',
            'debutMedi.after'=>'Entrer un temps de debut Medi aprés le temps de fin de Matin',

            'finMedi.required' => 'Vous devez fournir le temps de fin Medi',
            'finMedi.after'=>'Entrer un temps de fin Medi aprés le temps de debut Medi',

            'nbConge.required' => 'Vous devez fournir le nombre congée',
            'nbConge.numeric' => 'Vous devez fournir le nombre congée numéric',
        ];
} 
}
