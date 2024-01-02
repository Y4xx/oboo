@extends('layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title text-left">Demande de congé</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Demande de congé</a></li>
  
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
                                                        <th data-priority="1">Nom d'employer</th>
                                                        <th data-priority="1">Email d'employer</th>
                                                        <th data-priority="2">Date Debut de congé</th>
                                                        <th data-priority="3">Date Fin de congé</th>
                                                        <th data-priority="3">Commentaire</th>
                                                        <th data-priority="9">Actions</th>
                                                     
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach( $demandes as $demande)
                                                            <tr>
                                                                <td>{{$demande->employe->fullname}}</td>
                                                                <td>{{$demande->employe->email}}</td>
                                                                <td>{{$demande->date_debut}}</td>
                                                                <td>{{$demande->date_fin}}</td>
                                                                <td>{{$demande->commentaire}}</td>
                                                               
                                                                    <td>
                                                                        <a href="#accepter{{$demande->id}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Accepter</a>
                                                                        <a href="#refuser{{$demande->id}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> Refuser</a>
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
 @foreach( $demandes as $demande)
    @include('includes.accepter_refuser_congé')
 @endforeach

@endsection


@section('script')
<!-- Responsive-table-->

@endsection