<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Employee;
use App\Models\Schedule;
use App\Models\Type_Employes;
use App\Http\Requests\EmployeeRec;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{
   
    public function index()
    {
       $types = Type_Employes::all();
    //    dd(Employee::all());
        return view('admin.employee')->with(['employees'=> Employee::all(), 'schedules'=>Type_Employes::all()]);
    }

    public function store(EmployeeRec $request)
    {
        $request->validated();
        // Employee::create($request->post());
        $nomPhoto=null;
        if(isset($request->photo_profile)){
            $nomPhoto = time().'.'.$request->photo_profile->extension();
            $request->photo_profile->storeAs('images_profile', $nomPhoto);
        }else{$nomPhoto="profile.png";}
        $employee = new Employee;
        $employee->idtype_employer = $request->idtype_employer;
        $employee->fullname = $request->fullname;
        $employee->numTel = $request->numTel;
        $employee->email = $request->email;
        $employee->salaire = $request->salaire;
        $employee->nbjourconge = $request->nbjourconge;
        $employee->password = str_replace(' ', '', $request->fullname);
        $employee->photo_profile =$nomPhoto;
        $employee->save();
        // dd($employee->id);
        
        $user = new User;
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->photo_profile =$nomPhoto;
        $user->type = 'employer';
        $user->employerId = $employee->id;
        $user->password = Hash::make(str_replace(' ', '', $request->fullname));
        $user->save();

        
        if($request->schedule){

            $schedule = Schedule::whereSlug($request->schedule)->first();

            $employee->schedules()->attach($schedule);
        }

        // $role = Role::whereSlug('emp')->first();

        // $employee->roles()->attach($role);

        flash()->success('Success','Employee Record has been created successfully !');

        return redirect()->route('employees.index')->with('success');
    }

 
    public function update(EmployeeRec $request, String $id)
    {
        $request->validated();

        $employer= Employee::findOrFail($id);
        // dd($request->fullname);
        $employer->fullname = $request->fullname;
        $employer->email = $request->email;
        $employer->numTel = $request->numTel;
        $employer->nbjourconge = $request->nbjourconge;
        $employer->salaire = $request->salaire;
        $employer->idtype_employer = $request->idtype_employer;
        $employer->save();

        if ($request->schedule) {
            $employee->schedules()->detach();

            $schedule = Schedule::whereSlug($request->schedule)->first();

            $employee->schedules()->attach($schedule);
        }

        flash()->success('Success','Employee Record has been Updated successfully !');

        return redirect()->route('employees.index')->with('success');
    }


    public function destroy(String $id)
    {
        // $employee->delete();
        // flash()->success('Success','Employee Record has been Deleted successfully !');
        // return redirect()->route('employees.index')->with('success');


        $employer = Employee::findOrFail($id);
        // dd($employer);
        if ($employer) {
            $employer->delete();
            flash()->success('Success','Employer has been deleted successfully !');
            return redirect()->route('employees.index');
        } 
        else {
            flash()->success('Error','Employer has been not deleted !!');
            return redirect()->route('employees.index');
        }
    }

    public function EmployeeIU(){
        return view('Employee.index');
        
    }
}
