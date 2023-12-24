<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
              
            </div>
            <h4 class="modal-title"><b>Add System de Travail</b></h4>
            <div class="modal-body text-left">
                <form class="form-horizontal" method="POST" action="{{ route('schedule.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="control-label">Name</label>

                        
                            <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" id="name" name="name">
                            </div>
                        
                    </div>

                    {{-- Matain - Form --}}
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="debuMatain" class="control-label">Debut Matain</label>

                        
                            <div class="bootstrap-timepicker">
                                <input type="time" class="form-control timepicker" id="" name="debuMatain" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="finMatain" class="control-label">Fin Matain</label>
                            <div class="bootstrap-timepicker">
                                <input type="time" class="form-control timepicker" id="finMatain" name="finMatain" required>
                            </div>
                        </div>
                        
                    </div>

                    {{-- Medi - Form --}}
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="debuMedi" class="control-label">Debut Medi</label>

                        
                            <div class="bootstrap-timepicker">
                                <input type="time" class="form-control timepicker" id="" name="debutMedi" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="finMedi" class="control-label">Fin Medi</label>

                        
                            <div class="bootstrap-timepicker">
                                <input type="time" class="form-control timepicker" id="" name="finMedi" required>
                            </div>
                        </div>
                        
                    </div>



                    <div class="form-group">
                        <label for="" class="control-label">Nombre des joures de Conge</label>

                        
                            <div class="">
                                <input type="number" class="form-control" id="" name="nbConge" required>
                            </div>
                        
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

