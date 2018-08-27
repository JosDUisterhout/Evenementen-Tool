<!--

Geeft de uitnodiging weer aan de genodigde.

-->

@extends('layouts.main')

@section('content')

    <!-- Controle of de uitnodiging bestaat. Zo niet dan krijgt de genodigde dat te lezen. -->

    @if(!empty($invite))

    <h3 class="pb-3 mb-4 font-italic border-bottom">
        Uitnodiging
    </h3>

    <p>
        <strong>{{$event->user->name}}</strong> heeft u uitgenodigd voor:

        <strong>{{$event->title}}</strong>
    </p>

    <button data-toggle="modal" data-target="#responseModal"  aria-label="Edit" class="btn btn-primary">Antwoorden</button>

    @else

        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Uitnodiging
        </h3>


        <p>De uitnodiging bestaat niet.</p>

    @endif

    @endsection