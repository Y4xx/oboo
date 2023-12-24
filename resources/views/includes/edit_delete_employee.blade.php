<!-- Edit -->
<div class="modal fade" id="edit{{ $employee->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <h4 class="modal-title"><b><span class="employee_id">Edit Employee</span></b></h4>
            <div class="modal-body text-left">
                <form class="form-horizontal" method="POST" action="{{ route('employees.update', $employee->id) }}">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Nom Complet</label>
                            <input type="text" value="{{$employee->fullname}}" class="form-control" placeholder="Enter Employee Name" id="name" name="fullname"required />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Numero de telephone</label>
                            <input type="number" value="{{$employee->numTel}}" class="form-control" placeholder="Enter Numero de telephone" id="numTel" name="numTel"required />
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <label for="position">Email</label>
                        <input type="email" value="{{$employee->email}}" class="form-control" placeholder="Enter Employee Name" id="email" name="email"required />
                    </div>
                 
                  
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="salaire">Salaire</label>
                            <input type="number" value="{{$employee->salaire}}" class="form-control" placeholder="Enter Employee Name" id="salaire" name="salaire"required />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Nomre des jours Conge</label>
                            <input type="number" value="{{$employee->nbjourconge}}" class="form-control" placeholder="Enter nomre des jours Conge" id="nbjourconge" name="nbjourconge"required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="schedule" class="control-label">Type Employer</label>
                        <select class="form-control" id="idtype_employer" name="idtype_employer" required>
                            <option value="" >- Select -</option>
                            {{-- <option value="" selected>{{$employee->idtype_employer->type_nom}}</option> --}}
                            @foreach($schedules as $schedule)   
                             <option value="{{$schedule->id}}"  {{$schedule->id==$employee->idtype_employer?"selected":""}}>{{$schedule->type_nom}}</option>
                            @endforeach
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i>
                    Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete{{ $employee->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header " style="align-items: center">
               
              <h4 class="modal-title "><span class="employee_id">Delete Employee</span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('employees.destroy', $employee->id) }}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div class="text-center">
                        <h6>Are you sure you want to delete:</h6>
                        <h2 class="bold del_employee_name">{{$employee->fullname}}</h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
