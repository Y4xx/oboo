@extends('layouts.master')
@section('css')
@endsection

@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title text-left">Attendance sheet</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Management</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Attendance sheet</a></li>
  
    </ol>
</div>
@endsection
@section('css')
    <!-- Table css -->
    <link href="{{ URL::asset('plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css') }}" rel="stylesheet"
        type="text/css" media="screen">
@endsection


@section('content')

    <div class="card">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-responsive table-bordered table-sm">
                    <thead>
                        <tr>

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
                                <th>
                                    {{ $date }}
                                </th>

                            @endforeach

                        </tr>
                    </thead>

                    <tbody>


                        <form action="{{ route('check_store') }}" method="post">
                           
                            <button type="submit" class="btn btn-success" style="display: flex; margin:10px">submit</button>
                            @csrf
                            @foreach ($employees as $employee)

                                <input type="hidden" name="emp_id" value="{{ $employee->id }}">

                                <tr>
                                    <td>{{ $employee->fullname }}</td>
                                    <td>{{ $employee->type->type_nom }}</td>
                                    <td>{{ $employee->id }}</td>


                                    @for ($i = 1; $i < $today->daysInMonth + 1; ++$i)


                                        @php
                                            $date_picker = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('Y-m-d');
                                            
                                            $check_attd = \App\Models\Pointage::query()
                                            ->where('idemploye', $employee->id)
                                            ->where('dateDePointage', $date_picker)
                                            ->first();


                                            // $check_attd = \App\Models\Attendance::query()
                                            //     ->where('emp_id', $employee->id)
                                            //     ->where('attendance_date', $date_picker)
                                            //     ->first();
                                            
                                            // $check_leave = \App\Models\Leave::query()
                                            //     ->where('emp_id', $employee->id)
                                            //     ->where('leave_date', $date_picker)
                                            //     ->first();
                                            
                                        @endphp
                                        <td>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="check_box_attd"
                                                    name="attd[{{ $date_picker }}][{{ $employee->id }}]" type="checkbox"
                                                    @if (isset($check_attd->tempsMatain_1) && isset($check_attd->tempsMatain_2)) checked @endif value="1">
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="check_box_leave"
                                                    name="attd[{{ $date_picker }}][{{ $employee->id }}]" type="checkbox"
                                                    @if (isset($check_attd->tempsMedi_1) && isset($check_attd->tempsMedi_2)) checked @endif value="2">
                                                    {{-- {{$check_attd->tempsMedi_1}} --}}
                                            </div>
                                            

                                        </td>

                                    @endfor
                                </tr>
                            @endforeach

                        </form>


                    </tbody>


                </table>
            </div>
        </div>
    </div>
@endsection




