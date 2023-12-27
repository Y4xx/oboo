<div class="modal fade" id="accepter{{ $demande->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header " style="align-items: center">
               
              <h4 class="modal-title "><span class="employee_id">Demande de congé</span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="demande_congeé/accepter/{{ $demande->id }}">
                    @csrf
                    <div class="text-center">
                    <p> Si vous avez accepter le systeme renvoi le réponse à l'employé</p>
                        <h6> vous vouler vraiment accepter le demande congé de:</h6>
                        <h2 class="bold del_employee_name">{{$demande->employe->fullname}}</h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i>
                    Accepter</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="refuser{{ $demande->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header " style="align-items: center">
               
              <h4 class="modal-title "><span class="employee_id">Demande de congé</span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="demande_congeé/refuser/{{ $demande->id }}">
                    @csrf
                    <div class="text-center">
                        <p> Si vous avez accepter le systeme renvoi le réponse à l'employé</p>
                        <h6> vous vouler vraiment réfuser le demande congé de:</h6>
                        <h2 class="bold del_employee_name">{{$demande->employe->fullname}}</h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> Réfuser</button>
                </form>
            </div>
        </div>
    </div>
</div>

