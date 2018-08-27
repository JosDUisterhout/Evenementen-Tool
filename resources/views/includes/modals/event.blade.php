<!-- Pop-up voor aanmaken evemenenten -->
<div class="modal fade" id="createEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Toevoegen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="createEvent"  method="POST" action="/events/create">
                    @csrf
                    <div class="form-group">
                        <input id="ce_title" placeholder="titel" type="text" name="title" class="form-control" >
                    </div>
                    <div  class="form-group">
                        <textarea id="ce_text_area" placeholder="beschrijving" name="text_area" class="form-control" ></textarea>
                    </div>
                    <p><strong>Let op:</strong> De limiet is 1 afbeelding per evenement. <br>
                        De nieuwe afbeelding vervangt de oude.
                    </p>
                    <img id="preview" src="" alt="" />
                    <input id="ce_image" type="file" name="image" onchange="readURL(this)">
                    <a data-toggle="modal" data-target="#deleteModal"  aria-label="Close">
                        <span class="material-icons float-right" aria-hidden="true">delete</span>
                    </a>

                    <hr>
                    <input class="btn btn-primary" type="submit" value="Opslaan">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
                </form>
            </div>

        </div>
    </div>
</div>

@if(!empty($event))


<!-- Pop-up voor aanpassen evemenenten -->
<div class="modal fade" id="editEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Aanpassen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="updateEvent"  method="POST" action="/events/{{$event->id}}/update">
                    @csrf
                    <div class="form-group">
                        <input type="text" value="{{$event->title}}" name="title" class="form-control" >
                    </div>
                    <div class="form-group">
                        <textarea  name="text_area" class="form-control" >{{$event->text_area}}</textarea>
                    </div>
                    <img class="img-thumbnail" id="previewUpdate" src="{{'/photos/' . $event->image_url}}" alt="" />
                    <input id="deleted" type="hidden" name="deleted" value="false">
                    <input id="ce_image" type="file" name="image"  onchange="readUpdateURL(this)">
                    <a data-toggle="modal" data-target="#deleteModal"  aria-label="Close">
                        <span class="material-icons float-right" aria-hidden="true">delete</span>
                    </a>

                    <div class="modal-footer">


                    <input class="btn btn-primary" type="submit" value="Opslaan">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Pop-up voor verwijderen evemenenten -->
<div class="modal fade" id="deleteEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

            <form method="POST" action="/events/{{$event->id}}/destroy/">
            @csrf

            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Ja" />
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Nee</button>
            </div>

            </form>
        </div>
    </div>
</div>

    @endif