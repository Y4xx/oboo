@extends('layouts.master')
@section('css')
@endsection

@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title text-left">Sheet Report</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Management</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Sheet Report</a></li>
  
    </ol>
</div>
@endsection
@section('content')

    <div class="card">
        <div class="card-header bg-success text-white">
            TimeTable
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm" id="printTable">
                    <thead>
                        <tr >

                            <th>Employee Name</th>
                            <th>Employee Position</th>
                            <th>Employee ID</th>
                            @php
                                $today = today();
                                $dates = [];
                                
                                for ($i = 1; $i < $today->daysInMonth + 1; ++$i) {
                                    $dates[] = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('Y-m-d');
                                }
                                
                            @endphp
                            @foreach ($dates as $date)
                            <th style="">
                            
                                
                                    {{ $date }}
                            
                        </th>
                      

                            @endforeach

                        </tr>
                    </thead>

                    <tbody>





                        @foreach ($employees as $employee)

                            <input type="hidden" name="emp_id" value="{{ $employee->id }}">

                            <tr>
                                <td>{{ $employee->fullname }}</td>
                                <td>{{ $employee->type->type_nom }}</td>
                                <td>{{ $employee->id }}</td>


                                @for ($i = 1; $i < $today->daysInMonth + 1; ++$i)


                                    @php
                                        
                                        $date_picker = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('Y-m-d');
                                        // dd($date_picker);
                                        $check_attd = \App\Models\Pointage::query()
                                            ->where('idemploye', $employee->id)
                                            ->where('dateDePointage', $date_picker)
                                            ->first();
                                        
                                    @endphp
                                    <td>

                                        <div class="form-check form-check-inline ">
                                            {{-- @dd($check_attd) --}}
                                            @if (isset($check_attd))
                                                 @if (isset($check_attd->tempsMatain_1) && isset($check_attd->tempsMatain_2))
                                                 <i class="fa fa-check text-success"></i>
                                                 @else
                                                 <i class="fa fa-check text-warning"></i>
                                                 @endif
                                               
                                            @else
                                            <i class="fas fa-times text-danger"></i>
                                            @endif
                                        </div>
                                        <div class="form-check form-check-inline">
                                          
                                            @if (isset($check_attd))
                                            @if (!is_null($check_attd->tempsMedi_1) && !is_null($check_attd->tempsMedi_2))
                                            <i class="fa fa-check text-success"></i>
                                            @else
                                            <i class="fa fa-check text-warning"></i>
                                            @endif
                                          
                                       @else
                                       <i class="fas fa-times text-danger"></i>
                                       @endif
                                        

                                        </div>

                                    </td>

                                @endfor
                            </tr>
                        @endforeach





                    </tbody>


                </table>
            </div>
        </div>
    </div>
@endsection
