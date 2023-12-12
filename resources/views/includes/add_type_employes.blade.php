<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>

            <h4 class="modal-title"><b>Ajouter Type Employes</b></h4>
            <div class="modal-body">

                <div class="card-body text-left">

                    <form method="POST" action="{{ route('type_employes.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="type_employ">Type Employée</label>
                            <input type="text" class="form-control" placeholder="Entrer type employée" id="type_employ" name="type_employ"
                                required />
                        </div>
                        <div class="form-group">
                            <label for="heure_travaille">Heure de travaille</label>
                            <input type="text" class="form-control" placeholder="Entrer l'heure de travaille" id="heure_travaille" name="heure_travaille"
                                required />
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