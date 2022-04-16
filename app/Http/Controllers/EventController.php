<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //

    public function save_event(Request $request){
        $save = new Event();
        $save->event_title = $request->event_title;
        $save->event_date = $request->event_date;
        $save->event_city = $request->event_city;
        $save->event_address = $request->event_address;
//        $save->event_poster = $this->upload_image($request->file('event_poster'));
        $save->event_description = $request->event_description;
        $save->ticket_url = $request->ticket_url;
        $save->save();
        return back()->with('message',array('result' =>'Event saved successfully','class' => 'success'));
    }

    public function update_event(Request $request){
        $save = Event::where('id',$request->id)->first();
        $save->event_title = $request->event_title;
        $save->event_date = $request->event_date;
        $save->event_city = $request->event_city;
        $save->event_address = $request->event_address;
//        $save->event_poster = $this->upload_image($request->file('event_poster'));
        $save->event_description = $request->event_description;
        $save->ticket_url = $request->ticket_url;
        $save->save();
        return back()->with('message',array('result' =>'Event updated successfully','class' => 'success'));
    }

    public function edit_event(Request $request){
        $event = Event::where('id',$request->id)->first();
        return view('edit_events',compact('event'));
    }

    public function upload_image($file){
        $imageName = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('images'), $imageName);
        $imageName = 'images/'.$imageName;
        return $imageName;
    }


    public function home_events(Request $request){
        $events = Event::take(4)->orderBy('event_date','ASC')->get();
        return view('events',compact('events'))
            ->with('type','home');
    }

    public function home_events_all(Request $request){
        $events = Event::orderBy('event_date','ASC')->paginate(4);
        return view('events',compact('events'))
            ->with('type','full');
    }
}
