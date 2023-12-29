<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\demandecongée;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DemandeCongeController extends Controller
{
    public function index()
    {
        $demandes=demandecongée::where("reponse",0)->get();
        return view('admin.DemandeConge')->with(["demandes"=>$demandes]);
    }
    public function historique()
    {
        $demandes=demandecongée::where("reponse",1)->where("date_debut",'>=',date('Y-m-d'))->get();
        return view('admin.historique')->with(["demandes"=>$demandes]);
    }
    public function ajouter(Request $request){
        $date1 = Carbon::parse($request->date_debut);
        $date2 = Carbon::parse($request->date_fin);
        $dif = $date2->diff($date1);
        
        if ($date1->lessThanOrEqualTo(Carbon::now())) {
            // Check if the start date is less than or equal to the current date
            return redirect()->route('EmployeeIU.index')->with('error', 'La date de début de votre congé doit être postérieure à la date d\'aujourd\'hui');
        } elseif (Auth::user()->Employer->nbjourconge < $dif->days) {
            // Check if the user has enough remaining leave days
            return redirect()->route('EmployeeIU.index')->with('error', 'Il vous reste seulement : ' . Auth::user()->Employer->nbjourconge . ' de congés');
        } elseif (Auth::user()->Employer->nbjourconge > $dif->days ) {
            // If conditions are met, validate the request and save it
            $request->validate([
                'date_debut' => 'required|before:date_fin',
                'date_fin' => 'required|after:date_debut',
                'comment' => 'required|string',
            ]);
        
            $demande = new demandecongée;
            $demande->date_debut = $request->date_debut;
            $demande->date_fin = $request->date_fin;
            $demande->commentaire = $request->comment;
            $demande->id_employer = Auth::user()->Employer->id;
            $demande->save();
        
            return redirect()->route('EmployeeIU.index')->with('success', 'Votre demande a été envoyée. Attendez la réponse dans votre boîte mail');
        }
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
    public function delete_historique($id){
        $demande=demandecongée::find($id);
        $demande->delete();
        flash()->success('Success','demande congé has been deleted successfully !');
        return redirect()->route('historique');
    }

}
