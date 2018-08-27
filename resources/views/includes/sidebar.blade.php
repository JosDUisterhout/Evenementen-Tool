<!-- Layout voor de menu's in de sidebar -->
<div class="p-3">

        @if ($errors->any())

            <h4 class="font-italic">Meldingen</h4>

            <div class="alert alert-danger">

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <h4 class="font-italic">Mijn evenementen</h4>

        <ol class="list-unstyled mb-0">

            @foreach($events as $event)

            <li><a href="/events/{{$event->id}}">{{$event->title}}</a>

                <a data-toggle="modal" data-target="#deleteEventModal"  aria-label="Close">
                    <span class="material-icons float-right" aria-hidden="true">delete</span>
                </a>

            </li>

            @endforeach

            </ol>

        <hr>
        <a data-toggle="modal" data-target="#createEventModal"  aria-label="Close">
            <span class="material-icons float-right" aria-hidden="true">add</span>
        </a>
    </div>


    @yield('invites')






