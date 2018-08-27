<!--

Layout om alle evenementen weer te geven op de "Home" pagina

-->

@extends('layouts.main')

@section('content')

    <!--

    Onderstaande maakt voor elk evenement in de database een nieuw artikel aan.

    -->

    @foreach($events as $event)

        <div class="blog-post">

            <h2 class="blog-post-title"><a style="text-decoration: none;" href="/events/{{$event->id}} ">{{$event->title}}</a></h2>
            <p class="blog-post-meta">{{$event->created_at->toFormattedDateString()}} by {{$event->user->name}}</p>

            <div class="row">
                @if($event->has_image != 0)
                    <div class="col-md-6" >
                        <p>{{$event->text_area}}</p>
                    </div>
                    <div class="col-md-6">
                        <img class="img-fluid" src="{{'/photos/'.$event->image_url}}">
                    </div>
                @else
                    <div class="col-md-12" >
                        {{$event->text_area}}
                    </div>
                @endif


            </div>

        </div>

    @endforeach



@endsection






