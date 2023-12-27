<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\demandecongée;
use Illuminate\Support\Facades\Auth;

class DemandeCongeController extends Controller
{
    public function index()
    {
        $demandes=demandecongée::all();
        return view('admin.DemandeConge')->with(["demandes"=>$demandes]);
    }
    public function ajouter(Request $request){
        $request->validate([
            'date_debut' => 'required|before:date_fin',
            'date_fin' => 'required|after:date_debut',
            'comment' => 'required|string',
        ]);
        
        $demande=new demandecongée;
        $demande->date_debut=$request->date_debut;
        $demande->date_fin=$request->date_fin;
        $demande->commentaire=$request->comment;
        $demande->id_employer=Auth::user()->Employer->id;
        $demande->save();
        return redirect()->route('EmployeeIU.index')->with('success','Votre demande à envoyé attenderai la réponse dans votre boite mail');
       
    }
    public function accepter(Request $request,$id){
        $demande=demandecongée::find($id);
        $demande->reponse=1; $demande->acceptation=1;
        $demande->save();
        flash()->success('Success','Validé');
        return redirect()->route('demande_congeé');
    }
    public function refuser(Request $request,$id){
        $demande=demandecongée::find($id);
        $demande->reponse=1; $demande->acceptation=0;
        $demande->save();
        flash()->success('Success','Validé');
        return redirect()->route('demande_congeé');
    }

}
