<!-- Alle modals (pop-ups) -->

@if(Auth::check())


<!--event modals-->
@include('includes.modals.event')

@if(!empty($event))

<!--invite modals-->
@include('includes.modals.invite')

<!--feed modals-->
@include('includes.modals.feed')

@endif

<!--error modals-->
@include('includes.modals.error')


<!-- delete any element -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <div class="modal-footer">
                <button id="confirmDelete" type="button" data-dismiss="modal" class="btn btn-primary">Ja</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Nee</button>
            </div>
        </div>
    </div>
</div>



<!--response modals-->
@include('includes.modals.response')

    @endif



