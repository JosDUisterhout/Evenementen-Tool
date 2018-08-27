<?php

//Functies uitnodigingen.

namespace App\Http\Controllers;

use App\Invite;
use Illuminate\Http\Request;
use App\Event;





class InviteController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Controle en toevoegen uitnodiging.
    public function store(Request $request, $id)
    {


        $request->validate([
            'email' => 'required',
        ]);


        $i = Invite::create([
            'event_id' => $id,
            'email' => $request->input('email'),
            'status' => 2
        ]);

        $e = Event::find($id);
        $event = $e->title;
        $user = $e->user->name;
        $url = (url('/events/' . $e->id . '/invites/'. $i->id
        ));


        $data = [
            'user' => $user,
            'no-reply' => 'noreply@clickerino.nl',
            'target'    => $request->email,
            'event' => $event,
            'link' => $url

        ];

        \Mail::send('emails.invite', ['data' => $data],
            function ($message) use ($data)
            {
                $message
                    ->from($data['no-reply'])
                    ->to($data['target'])->subject('Uitnodiging voor evenement: ' . $data['event']);
            });

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invite  $invite
     * @return \Illuminate\Http\Response
     */
    //Weergave losse uitnodiging op basis van id. (voor losse pagina's).
    public function show($id, $invite)
    {

        $event = Event::find($id);

        $invite = Invite::find($invite);

        $events = Event::all();

        return view('invite', compact('invite', 'events','event'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invite  $invite
     * @return \Illuminate\Http\Response
     */
    //Controle en aanpassen uitnodiging.
    public function update( $invite, Request $request)
    {

        $invite = Invite::find($invite);



        if($request->status != null){
           $status = 0;
        }
        else{
           $status = 1;
        }

        $invite->status = $status;

        $invite->save();


        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invite  $invite
     * @return \Illuminate\Http\Response
     */
    //Verwijderen uitnodiging.
    public function destroy(Request $request)
    {

        //
        $inviteToDelete = Invite::find($request->id);

        $inviteToDelete->delete();



        return back();

    }

    public function send(Request $request)
    {

    }
}



