<!-- Pop-up voor antwoord genodigde -->
<div class="modal fade" id="responseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Uitnodiging</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <form method="POST" action="{{url()->current()}}/update">

                <div class="modal-body">
                    Uitnodiging accepteren?

                @csrf

                    <br>

                <label>
                    <input name="status" type="checkbox" data-toggle="toggle" id="inviteCheck">
                </label>




            </div>
            
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Verzenden</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
            </div>

            </form>
        </div>
    </div>
</div>

