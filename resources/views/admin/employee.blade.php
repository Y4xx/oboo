@extends('layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title text-left">Employees</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
       
            <li class="breadcrumb-item"><a href="javascript:void(0);">Employees</a></li>
        
        
  
    </ol>
</div>
@endsection
@section('button')

@if(isset($employees))
    <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="mdi mdi-plus mr-2"></i>Add</a>
    <a href="/employe_congé"  class="btn btn-primary btn-sm btn-flat">Employés en congé</a>  
@else
<a href="/employees"  class="btn btn-primary btn-sm btn-flat">Employés </a>
@endif

@endsection

@section('content')
@include('includes.flash')
<!--Show Validation Errors here-->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!--End showing Validation Errors here-->


                      <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        @if(isset($employees))
                                                    <thead>
                                                    <tr>
                                                        <th data-priority="1">Employee ID</th>
                                                        <th data-priority="2">Nom compler</th>
                                                        <th data-priority="3">Numero de Telephone</th>
                                                        <th data-priority="4">Salaire</th>
                                                        <th data-priority="7">Type d'employee</th>
                                                        <th data-priority="5">Nembre de jour de Conge</th>
                                                        <th data-priority="6">Email</th>
                                                        <th data-priority="8">Password</th>
                                                        <th data-priority="9">Actions</th>
                                                     
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach( $employees as $employee)
                                                            <tr>
                                                                <td>{{$employee->id}}</td>
                                                                <td>{{$employee->fullname}}</td>
                                                                <td>{{$employee->numTel}}</td>
                                                                <td>{{$employee->salaire}}</td>
                                                                <td>{{$employee->Type->type_nom}}</td>
                                                                <td>{{$employee->nbjourconge}}</td>
                                                                <td>{{$employee->email}}</td>
                                                                <td>{{$employee->password}}</td>
                                                               
                                                                <td>
                                                                    <a href="#edit{{$employee->id}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>
                                                                    <a href="#delete{{$employee->id}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> Delete</a>
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                   
                                                    </tbody>
                                                @else 
                                                <thead>
                                                    <tr>
                                                        <th data-priority="2">Nom complet</th>
                                                        <th data-priority="3">Numero de Telephone</th>
                                                        <th data-priority="6">Email</th>
                                                        <th data-priority="7">Type d'employee</th>
                                                        <th data-priority="5">Date de debut de congé</th> <th data-priority="5">Date de fin de congé</th>
                                                        <th data-priority="9">Nombre jours rester</th>
                                                        <th data-priority="9">Congés</th>
                                                     
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach( $demandes as $demande)
                                                            <tr>
                                                               
                                                                <td>{{$demande->employe->fullname}}</td>
                                                                <td>{{$demande->employe->numTel}}</td>
                                                                <td>{{$demande->employe->email}}</td>
                                                                <td>{{$demande->employe->Type->type_nom}}</td>
                                                                <td>{{$demande->date_debut}}</td> <td>{{$demande->date_fin}}</td>
                                                                <td>
                                                                    {{ \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($demande->date_fin)) }} jours
                                                                </td>
                                                                
                                                               <td>En congé</td>
                                                               
                                                            </tr>
                                                        @endforeach
                                                @endif
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->    
                                    
@if(isset($employees))
    @foreach( $employees as $employee)
        @include('includes.edit_delete_employee')
    @endforeach
@endif



@include('includes.add_employee')

@endsection


@section('script')
<!-- Responsive-table-->

@endsection