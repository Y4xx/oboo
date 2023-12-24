<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>

            <h4 class="modal-title"><b>Add Employee</b></h4>
            <div class="modal-body">

                <div class="card-body text-left">

                    <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Nom Complet</label>
                                <input type="text" class="form-control" placeholder="Enter Employee Name" id="name" name="fullname"required />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Numero de telephone</label>
                                <input type="number" class="form-control" placeholder="Enter Numero de telephone" id="numTel" name="numTel"  required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 ">
                                <label for="position">Email</label>
                                <input type="email" class="form-control" placeholder="Enter Employee Name" id="email" name="email"required />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="photo_profile">photo_profile</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="photo_profile"  name="photo_profile">
                                    <label class="custom-file-label" for="customFileLang">Select photo</label>
                                </div>
                            </div>
                         </div>
                       
                        
                    
                        
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="salaire">Salaire</label>
                                <input type="number" class="form-control" placeholder="Enter Employee Name" id="salaire" name="salaire"required />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Nomre des jours Conge</label>
                                <input type="number" class="form-control" placeholder="Enter nomre des jours Conge" id="nbjourconge" name="nbjourconge"required />
                            </div>
                        </div>
                        <input type="hidden" value="test 123" class="form-control" placeholder="Enter nomre des jours Conge" id="password" name="password" required />
                
                        
                        <div class="form-group">
                            <label for="schedule" class="control-label">Type Employer</label>
                            <select class="form-control" id="idtype_employer" name="idtype_employer" required>
                                <option value="" selected>- Select -</option>
                                @foreach($schedules as $schedule)
                                <option value="{{$schedule->id}}">{{$schedule->type_nom}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5" data-dismiss="modal">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>


        </div>

    </div>
</div>
</div>