<?php

namespace App\Http\Controllers;

use de;
use App\Models\Schedule;
use App\Models\Systeme_de_travail;
use App\Http\Requests\ScheduleEmp;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
   
    public function index()
    {
     
        // return view('admin.schedule')->with('schedules', Schedule::all());
        return view('admin.schedule')->with('schedules', Systeme_de_travail::all());
        flash()->success('Success','Schedule has been created successfully !');

    }


    public function store(ScheduleEmp $request)
    {
        $request->validated();
        $schedule = new Systeme_de_travail;
        $schedule->idAdmin = Auth::user()->id;
        $schedule->name = $request->name;
        $schedule->debuMatain = $request->debuMatain;
        $schedule->finMatain = $request->finMatain;
        $schedule->debuMedi = $request->debutMedi;
        $schedule->finMedi = $request->finMedi;
        $schedule->nbConge = $request->nbConge;
        $schedule->save();
        flash()->success('Success','Schedule has been created successfully !');
        return redirect()->route('schedule.index');
    }

    public function update(ScheduleEmp $request, String $id)
    {
        // $request['debuMatain'] = str_split($request->debuMatain, 5)[0];
        // $request['finMatain'] = str_split($request->finMatain, 5)[0];
        
        $request->validated();
        $schedule = Systeme_de_travail::findOrFail($id);
        // dd($schedule);

        $schedule->name = $request->name;
        $schedule->debuMatain = $request->debuMatain;
        $schedule->finMatain = $request->finMatain;
        $schedule->debuMedi = $request->debutMedi;
        $schedule->finMedi = $request->finMedi;
        $schedule->nbConge = $request->nbConge;
        $schedule->save();
        flash()->success('Success','Schedule has been Updated successfully !');
        return redirect()->route('schedule.index');


    }

  
    public function destroy(String $id)
    {
        // $schedule->delete();
        // flash()->success('Success','Schedule has been deleted successfully !');
        // return redirect()->route('schedule.index');


        $schedule = Systeme_de_travail::findOrFail($id);
        // dd($schedule);
        if ($schedule) {
            $schedule->delete();
            flash()->success('Success','Schedule has been deleted successfully !');
            return redirect()->route('schedule.index');
        } 
        else {
            flash()->success('Error','Schedule has been not deleted !!');
            return redirect()->route('schedule.index');        
        }
    }
}
