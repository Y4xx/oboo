<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Leave;
use App\Models\Employee;
use App\Models\Pointage;
use App\Models\Attendance;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function index()
    {
        return view('admin.check')->with(['employees' => Employee::all()]);
    }

    public function CheckStore(Request $request)
    {
        $todayDate = Carbon::now()->format('Y-m-d');
        $todayTime = Carbon::now()->format('H:i:s');

        if (isset($request->attd)) {
            foreach ($request->attd as $keys => $values) {
                foreach ($values as $key => $value) {
                    // dd($keys);
                    // dd($value);
                    if (($employee = Employee::whereId($key)->first())) {

                        $pointage = Pointage::where('dateDePointage', $keys)->where("idemploye", $key)->first();
                        if (isset($pointage)) {
                            if($value == 2){
                                // dd('kayeen');
                                    $pointage->tempsMedi_1 = $todayTime;
                                    $pointage->tempsMedi_2 = $todayTime;
                                    // $pointage->dateDePointage = $keys;
                                    $pointage->save();
                                }


                        }else{
                            if($value == 1){
                                // dd('rah 1');
                                $pointage = new Pointage;
                                $pointage->idemploye = $key;
                                $pointage->tempsMatain_1 = $todayTime;
                                $pointage->tempsMatain_2 = $todayTime;
                                $pointage->dateDePointage = $keys;
                                $pointage->save();
                            }
                            // dd('makayench');
                        }
                    }
                }
            }
        }
        // if (isset($request->leave)) {
        //     foreach ($request->leave as $keys => $values) {
        //         foreach ($values as $key => $value) {
        //             if ($employee = Employee::whereId(request('emp_id'))->first()) {
        //                 if (
        //                     !Leave::whereLeave_date($keys)
        //                         ->whereEmp_id($key)
        //                         ->whereType(1)
        //                         ->first()
        //                 ) {
        //                     $data = new Leave();
        //                     $data->emp_id = $key;
        //                     $emp_req = Employee::whereId($data->emp_id)->first();
        //                     $data->leave_time = $emp_req->schedules->first()->time_out;
        //                     $data->leave_date = $keys;
        //                     // if ($employee->schedules->first()->time_out <= $data->leave_time) {
        //                     //     $data->status = 1;
                                
        //                     // }
        //                     // 
        //                     $data->save();
        //                 }
        //             }
        //         }
        //     }
        // }
        flash()->success('Success', 'You have successfully submited the attendance !');
        return back();
    }
    public function sheetReport()
    {

    return view('admin.sheet-report')->with(['employees' => Employee::all()]);
    }
}
