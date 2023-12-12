<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Type_Employes;
use TypeEmployes;

class Type_EmployesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $types=Type_Employes::all();
        return view("admin.type_employes")->with(["types"=>$types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        ["type_employ"=>"required","heure_travaille"=>"required|numeric"]);
        $type=new Type_Employes();
        $type->type_nom=$request->type_employ;
        $type->Heure_de_travaille_par_jour=$request->heure_travaille;
        $type->save();
        return redirect()->route('type_employes.index')->with([
            "success" => "Employe updated successfully"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $type=Type_Employes::find($id);
        $type->type_nom=$request->type_employ; 
        $type->Heure_de_travaille_par_jour=$request->heure_travaille;
        $type->save();
        return redirect()->route("type_employes.index")->with("valider");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type=Type_Employes::find($id);
        $type->delete();
        return redirect()->route("type_employes.index")->with("valider");
    }
}
