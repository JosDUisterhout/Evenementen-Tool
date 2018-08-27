<!-- Layout voor het weergeven van een los evenement op een losse pagina -->

@extends('layouts.main')

@section('content')



<div class="blog-post">

    <h2 class="blog-post-title">{{$event->title}}</h2>
    <p class="blog-post-meta">{{$event->created_at->toFormattedDateString()}} by {{$event->user->name}}</p>

    <div class="row">
        @if($event->has_image != 0)
            <div class="col-md-6" >
                <p>{{$event->text_area}}</p>
            </div>
            <div class="col-md-6">
                <img class="img-thumbnail" src="{{'/photos/' . $event->image_url}}">
            </div>
        @else
            <div class="col-md-12" >
                {{$event->text_area}}
            </div>
        @endif

    </div>

        @if(Auth::check())
                <hr>
                <a data-toggle="modal" data-target="#editEventModal"  aria-label="Close">
                    <span class="material-icons float-right" aria-hidden="true">edit</span>
                </a>
            @endif




</div>
<hr>

<h3 id="feed" >Feed:</h3>

<div class="comments">


    <ul class="list-group">

        @foreach($event->newsFeeds as $news_item)

        <li class="list-group-item">
            <strong> {{$news_item->updated_at->diffForHumans()}} &nbsp;</strong>
            <p id="{{$news_item->id}}-content" data-field-content="{{$news_item->content}}">
            {{$news_item->content}}
            </p>
            @if(Auth::check())
                <hr>
                <a  data-toggle="modal" data-target="#editFeedModal"  aria-label="Edit"><span id="{{$news_item->id}}" class="open-newsFeedUpdateModal material-icons" aria-hidden="true">edit</span></a>
            <a data-toggle="modal" data-target="#deleteFeedModal"   aria-label="Close"><span id="{{$news_item->id}}"  class="open-newsFeedDeleteModal material-icons " aria-hidden="true">delete</span></a>



                @endif
        </li>

        @endforeach
    </ul>

</div>

<hr>

@if(Auth::check())

<form  method="POST" action="/events/{{$event->id}}/feed/create">

    @csrf

    <div class="form-group">
        <textarea name="body" class="form-control" ></textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Aan feed toevoegen</button>
    </div>

</form>

    @endif

<hr>


@endsection

@section('invites')

    <div class="p-3">
        <h4 class="font-italic">Uitnodigingen</h4>

        @foreach($event->invites as $invite )

            <text id="{{$invite->id}}">{{$invite->email}}</text>

            <a   data-toggle="modal" data-target="#deleteInviteModal"  aria-label="Close">
                <span class="material-icons float-right open-inviteDeleteModal" id="{{$invite->id}}" aria-hidden="true">delete</span>
            </a>

            <span class="material-icons float-right" aria-hidden="true">
            <a class="nounderline" href="{{  $event->id . '/invites/' . $invite->id }}">
            @if($invite->status === 1)done
            @elseif($invite->status === 2)timer
            @else close
            @endif

            </a>

            </span>

            <br>

            @endforeach



        <hr>
        <a  data-toggle="modal" data-target="#createInviteModal"  aria-label="Close">
            <span class="material-icons float-right" aria-hidden="true">add</span>
        </a>
    </div>



    @endsection