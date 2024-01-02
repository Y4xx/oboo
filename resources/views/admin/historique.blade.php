@extends('layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title text-left">Historique de Congé</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Management</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Historique de Cogé</a></li>
  
    </ol>
</div>
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
                                                        <th data-priority="1" class="text-center">information</th>
                                                        <th data-priority="9" class="text-center">Rèponse</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                        <tr>
                                                            <td>
                                                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th data-priority="1">Nom complet</th><th data-priority="6">Email</th><th data-priority="2">Date Debut de congé</th>
                                                                    <th data-priority="3">Date Fin de congé</th>
                                                                    <th data-priority="9">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach( $demandes as $demande)
                                                                @if ($demande->acceptation==0 )
                                                                <tr>
                                                                    <td>{{$demande->employe->fullname}}</td> <td>{{$demande->employe->email}}</td> <td>{{$demande->date_debut}}</td>
                                                                    <td>{{$demande->date_fin}}</td>
                                                                    <td>
                                                                        <a href="#delete{{$demande->id}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat mt-2"><i class='fa fa-trash'></i> Delete</a></br>
                                                                    </td>
                                                                </tr>
                                                                    @endif
                                                                @endforeach
                                                            <tbody>
                                                        </table>
                                                            </td>
                                                            <td class="text-danger text-center"  >Réfuser</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th data-priority="1">Nom complet</th><th data-priority="6">Email</th><th data-priority="2">Date Debut de congé</th>
                                                                    <th data-priority="3">Date Fin de congé</th>
                                                                    <th data-priority="9">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach( $demandes as $demande)
                                                                @if ($demande->acceptation==1 )
                                                                <tr>
                                                                    <td>{{$demande->employe->fullname}}</td> <td>{{$demande->employe->email}}</td> <td>{{$demande->date_debut}}</td>
                                                                    <td>{{$demande->date_fin}}</td>
                                                                    <td>
                                                                        <a href="#delete{{$demande->id}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat mt-2"><i class='fa fa-trash'></i> Delete</a></br>
                                                                    </td>
                                                                </tr>
                                                                    @endif
                                                                @endforeach
                                                            <tbody>
                                                        </table>
                                                            </td>
                                                            <td class="text-success text-center"  >Accepter</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->    

@endsection
@foreach( $demandes as $demande)
    @include('includes.delete_historique')
@endforeach

@section('script')
<!-- Responsive-table-->

@endsection