<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\BookEvent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index(){
        $events = Event::with('user')->with('group')->orderby('id','desc')->paginate(5);

        return view('frontend.pages.events',compact('events'));
    }

    public function createEvent(){

        return view('frontend.pages.createevent');
    }

    public function createGroupEvent($id){
        $id = $id;
        return view('frontend.pages.createevent',compact('id'));
    }

    public function storeEvent(Request $request){


           $validate = $request->validate([

            'name' => 'required',
            'tagline' => 'required',
            'start' => 'required',
            'end' => 'required',
            'mcguffin' => 'required'

           ]);

           if ($request->hasfile('image')) {
            $name = !empty($request->title) ? $request->title : config('app.name');

            $name = Str::slug($name, '-')  . "-" . time() . '.' . $request->image->extension();
            $request->image->move(public_path("/user/event/images/"), $name);


        }else{
            $name = "";
        }

           $event = new Event();
           $event->title = $request->title;
           $event->description = $request->description;
           $event->event_date = $request->date;
           $event->user_id = Auth::user()->id;
           $event->interest = $request->interest;
           $event->group_id = $request->group_id;
           $event->image = $name;
           if($event->save()){
               return response()->json('Event Created');
           }else{
               return response()->json('Something Went Wrong');
           }


    }

    public function eventDetail(Request $request){

        $id = $request->id;
        $event = Event::where('id',$id)->first();
        return view('frontend.pages.detail',compact('event'));

    }

    public function bookEvent($id){

        $event = Event::with('group')->where('id',$id)->first();
        $participants= BookEvent::where('event_id',$id)->with('participents')->get();
        return view('frontend.pages.bookevent',compact('event','participants'));

    }

    public function eventBooking(Request $request){


        $exists = BookEvent::where(['participent_id'=>Auth::user()->id,'event_id'=>$request->event_id])->first();
        empty($exists) ?  $booked=BookEvent::create($request->all()) : $exists->delete();
        $events = Event::with('user')->with('group')->paginate(5);
         return view('frontend.pages.events',compact('events'));

    }
}
