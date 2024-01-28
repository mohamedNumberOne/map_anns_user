<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalExample"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalExample">Êtes-vous sûr de vouloir supprimer ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Sélectionnez "Supprimer" ci-dessous si vous souhaitez supprimer departement !</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href=""
                    onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                    Supprimer
                </a>
                <input type="hidden" class="form-control" name="id" id="id" >
                <form id="delete-form" method="POST" action="">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
</div>
