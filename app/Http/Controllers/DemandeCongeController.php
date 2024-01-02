<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\reponse_admin;
use App\Mail\refuse_demande;
use Illuminate\Http\Request;
use App\Models\demandecongée;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DemandeCongeController extends Controller
{
    public function index()
    {
        $demandes=demandecongée::where("reponse",0)->get();
        return view('admin.DemandeConge')->with(["demandes"=>$demandes]);
    }
    public function historique()
    {
        $demandes=demandecongée::where("reponse",1)->where("date_fin",'>=',date('Y-m-d'))->get();
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
           
            $demande_dern= demandecongée::where('id_employer',Auth::user()->Employer->id)->where('acceptation',1)->orderBy('date_fin',"DESC")->select()->first();
            $date3 = Carbon::parse($demande_dern->date_fin);
            if( $date1->lessThanOrEqualTo($date3)){
                return redirect()->route('EmployeeIU.index')->with('error', 'Impossible car votre dernièr congé fini en '.$demande_dern->date_fin );
            }else{
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
    }

    public function accepter($id){
        $demande=demandecongée::find($id);
        $user=Employee::find( $demande->id_employer);
        try {
            Mail::to($user->email)->send(new reponse_admin($user->id,$user->email,$user->fullname,
            $demande->date_debut,$demande->date_fin,$id));
        } catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());
            // Optionally, you can throw the exception again to halt execution
            throw $e;
        }
        flash()->success('Success','émail envoyer');
        return redirect()->route('demande_congeé');
    }

    public function verification($hash){
        $decoded=explode('///',base64_decode($hash));
        $id_dmnd=$decoded[0];
        $demande=demandecongée::find($id_dmnd);
       
        $demande->reponse=1;
        $demande->save();
        return view('emails.valider')->with(['id_dmnd'=>$id_dmnd,'dt_db'=>$demande->date_debut,'dt_df'=>$demande->date_fin]);
    }

    public function verification_valider($id_dem){
        $demande=demandecongée::find($id_dem);
        $days=Carbon::parse($demande->date_debut)->diffInDays(Carbon::parse($demande->date_fin));
        $user=Employee::find($demande->id_employer);
       
       $user->nbjourconge=$user->nbjourconge-$days;
       $user->save();
        $demande->acceptation=1;
        $demande->save();
        return redirect()->route('verf');
    }

    public function verification_reponse(){
        return view('emails.reponse');
    }

    public function refuser($id){
        $demande=demandecongée::find($id);
        $user=Employee::find( $demande->id_employer);
        $demande->reponse=1; $demande->acceptation=0;
        $demande->save();
        try {
            Mail::to($user->email)->send(new refuse_demande($user->id,$user->email,$user->fullname,
            $demande->date_debut,$demande->date_fin,$id));
        } catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());
            // Optionally, you can throw the exception again to halt execution
            throw $e;
        }
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
