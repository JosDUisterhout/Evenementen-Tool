<?php

//Functies evenementen.

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\UploadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Haalt alle evenementen op voor weergave op home pagina
    public function index()
    {
        //
        $events = Event::all();

        return view('index', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //Controle en toevoegen evenement.
    public function store(UploadRequest $request)
    {

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('photos', $filename);
            $has_image = 1;
        }
        else {
            $has_image = 0;
            $filename= 'null';
        }

        //nieuw evenement
        $event = new Event;

        //invoer gegevens evenement
        $event->user_id = Auth::user()->id;
        $event->title = $request->title;
        $event->text_area = $request->text_area;
        $event->has_image = $has_image;
        $event->image_url = $filename;

        //evenement opslaan
        $event->save();

        //redirect naar home pagina
        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    //Weergave los evenement op basis van id. (voor losse pagina's).
    public function show($id)
    {

        $event = Event::find($id);

        $events = Event::all();

        return view('event', compact('event', 'events'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    //Controle en aanpassen evenement.
    public function update(UploadRequest $request, $id)
    {
        $event = Event::find($id);

        //
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('photos', $filename);
            $has_image = 1;
        }
        elseif(!$request->hasfile('image') && $request['deleted'] != "true"){
            $filename = $event->image_url;
            $has_image = 1;
        }
        else {
            $has_image = 0;
            $filename= 'null';
        }

        $event->user_id = Auth::user()->id;
        $event->title = $request->title;
        $event->text_area = $request->text_area;
        $event->has_image = $has_image;
        $event->image_url = $filename;

        $event->save();

        return redirect('events/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */

    //Verwijderen evenement.
    public function destroy($id)
    {


        $event = Event::find($id);

        $event->delete();

        return redirect('/');
    }
}
