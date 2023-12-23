<?php

namespace App\Http\Controllers;

use DateTime;
use DateInterval;
use App\Models\Pointage;
use Illuminate\Http\Request;
// use Carbon\Carbon;
use Illuminate\Support\Carbon;
use App\Models\Systeme_de_travail;
use Illuminate\Support\Facades\Auth;

class PointageController extends Controller
{
    public function Pointer(Request $request){
        // dd(Carbon::now()->format('Y-m-d'));
        $todayDate = Carbon::now()->format('Y-m-d');
        $now = Carbon::parse("13:20:00");
        $todayTime = Carbon::now()->format('H:i:s');


        $interval = new DateInterval('PT30M'); // 30 minutes interval
        $system = Systeme_de_travail::first(); 

        $origin = Carbon::parse($system->debuMatain);
        $originPlus = Carbon::parse($system->debuMatain)->addMinutes(30);
        
        // var_dump($originPlus);
        // dd($originPlus);
        // dd($addMinutesAdd30);
        // $test = $this->Add30($system->debuMatain);
        // dd("test");

        // if($now->between($origin, $originPlus)){
        //     dd(true);
        // }else{
        //     dd(false);
        // }
        


        $p = Pointage::where("idemploye", $request->idemploye)->where('dateDePointage', $todayDate)->exists();
        if($p){
            $line = Pointage::where("idemploye", $request->idemploye)->where('dateDePointage', $todayDate)->first();
            // dd(Auth::user()->id);
            if($line->tempsMatain_2 === '00:00:00' && $now->between(Carbon::parse($system->finMatain), $this->Add30($system->finMatain))){
                $line->tempsMatain_2 = $todayTime;
                $line->save();
            }else{
                if($line->tempsMedi_1 === '00:00:00' && $now->between(Carbon::parse($system->debuMedi), $this->Add30($system->debuMedi))){
                    $line->tempsMedi_1 = $todayTime;
                    $line->save();
                }else{
                    if($line->tempsMedi_2 === '00:00:00' && $now->between(Carbon::parse($system->finMedi), $this->Add30($system->finMedi))){
                        $line->tempsMedi_2 = $todayTime;
                        $line->save();
                    }else{
                        return redirect()->route('EmployeeIU.index')->with('error' , 'Is not the time for Check in');
                    }
                }
            }





        }else{

            if($now->between(Carbon::parse($system->debuMatain), $this->Add30($system->debuMatain))){
                $pointage = new Pointage;
                $pointage->idemploye = $request->idemploye;
                $pointage->tempsMatain_1 = $todayTime;
                $pointage->dateDePointage = $todayDate;
                $pointage->save();
            }else{
                return redirect()->route('EmployeeIU.index')->with('error' , 'You Are so late for the <debuMatain>');
                // dd('You Are so late for the <debuMatain>');
            }
        }
        
        
        // flash()->success('Success','Successfully Ponter !');
        return redirect()->route('EmployeeIU.index')->with('success' , 'Successfully Ponter !');
        }

    public function Add30(string $time){
        return Carbon::parse($time)->addMinutes(30);
    }
}
