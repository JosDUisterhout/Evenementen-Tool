<?php

//Functies nieuwsberichten.

namespace App\Http\Controllers;

use App\NewsFeed;
use Illuminate\Http\Request;

class NewsFeedController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Controle en toevoegen nieuwsbericht.
    public function store($id, Request $request)
    {

        $request->validate([
            'body' => 'required',
        ]);

        newsFeed::create([
            'event_id' => $id,
            'content' => request('body')
        ]);

        return back();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NewsFeed  $newsFeed
     * @return \Illuminate\Http\Response
     */
    //Controle en aanpassen nieuwbericht.
    public function update(Request $request)
    {

       $request->validate([
            'body' => 'required',
        ]);

        $myFeed = NewsFeed::find($request->feedId);

        $myFeed->content = $request->body;

        $myFeed->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NewsFeed  $newsFeed
     * @return \Illuminate\Http\Response
     */
    //Verwijderen nieuwsbericht.
    public function destroy(Request $request)
    {
        $myFeed = NewsFeed::find($request->feedId);

        $myFeed->delete();

        return back();

    }
}
