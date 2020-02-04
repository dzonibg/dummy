<?php

namespace App\Http\Controllers;

use App\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = \DB::table('events')->select("id", "value", "time")->limit(24)->get();
//        $data = json_encode($events);
        $data = $events;
        return view('chart', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("test");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo "store" . '<br>';
        echo $request->date . '<br>';
        echo $request->value . '<br>';
        echo Carbon::now();
        $event = new Event();
        $event->value = $request->value;
        $event->time = Carbon::now();
        $event->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show() //Event $event
    {
        return view("event.show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }

    public function datepicker() {
        return view("datepicker");
    }

    public function viewdate(Request $request) {
        $date = $request->get('date');
        $startdate = explode(' - ', $date)[0];
        $enddate = explode(' - ', $date)[1];
        return view('viewdate', ['startdate' => $startdate, 'enddate' => $enddate]);
    }
}
