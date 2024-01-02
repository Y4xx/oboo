@extends('layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title text-left">Type des Employés</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Management</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Type des Employés</a></li>
  
    </ol>
</div>
@endsection
@section('button')
<a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="mdi mdi-plus mr-2"></i>Ajouter</a>
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
                                        
                                                    <thead>
                                                    <tr>
                                                        <th data-priority="1">Type Employee</th>
                                                        <th data-priority="2">Heure de travaille par jour</th>
                                                        <th data-priority="3">Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach( $types as $type)
                                                        <tr>
                                                            <td>{{$type->type_nom}}</td>
                                                            <td>{{$type->Heure_de_travaille_par_jour}}h</td>
                                                            <td>
                                                                <a href="#edit{{$type->id}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Modifier</a>
                                                                <a href="#delete{{$type->id}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> Supprimer</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                   
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->   
                        
@include('includes.add_type_employes')

@foreach( $types as $type)
    @include('includes.edit_delete_type_employes')
@endforeach
@endsection


@section('script')
<!-- Responsive-table-->

@endsection