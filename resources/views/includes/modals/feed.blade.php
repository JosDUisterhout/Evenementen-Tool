<!-- Pop-up voor aanpassen nieuwsberichten -->
<div class="modal fade" id="editFeedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Aanpassen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="feedForm"  method="POST" action="{{url()->current()}}/feed/">

                    @csrf

                    <input type="hidden" name="feedId" id="feedId" value=""/>

                    <div class="form-group">
                        <textarea id="feedContent"  type="text" name="body" class="form-control" ></textarea>
                    </div>




                <button type="submit" class="btn btn-primary">Verzenden</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Pop-up voor verwijderen nieuwsberichten -->
<div class="modal fade" id="deleteFeedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

            <form id="feedDeleteForm" method="POST" action="/events/{{$event->id}}/feed/">
                @csrf

                <input type="hidden" name="feedId" id="feedDeleteId" value=""/>

                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Ja" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Nee</button>
                </div>

            </form>
        </div>
    </div>
</div>