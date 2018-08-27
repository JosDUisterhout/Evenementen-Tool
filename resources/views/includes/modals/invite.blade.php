<!-- Pop-up voor aanmaken uitnodigingen -->
<div class="modal fade" id="createInviteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Toevoegen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  method="POST" action="/events/{{$event->id}}/invites/create">

                    @csrf

                    <div class="form-group">
                        <input placeholder="e-mail adres" type="text" name="email" class="form-control" >
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Verzenden</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<!-- Pop-up voor verwijderen uitnodigingen -->
<div class="modal fade" id="deleteInviteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Verwijderen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Weet u het zeker?
            </div>

            <form id="inviteDeleteForm" method="POST" action="/events/{{$event->id}}/invites/">
                @csrf

                <input type="hidden" name="id" id="inviteDeleteId">

                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Ja" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Nee</button>
                </div>

            </form>

        </div>
    </div>
</div>
