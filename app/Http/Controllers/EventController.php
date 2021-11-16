<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\BookEvent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where('user_id',Auth::user()->id)->with('user')->with('group')->orderby('id','desc')->paginate(15);
        return view('frontend.pages.events',compact('events'));
    }

    public function createEvent(){
        $interests = User::where('id',Auth::user()->id)->with('interests')->first()->interests;
        return view('frontend.pages.createevent',compact('interests'));
    }

    public function createGroupEvent($id){

        $id = $id;
        return view('frontend.pages.createevent',compact('id'));
    }

    public function storeEvent(Request $request){



           $validate = $request->validate([
            'title' => 'required',
            'tagline' => 'required',
            'startdate' => 'required',
            'enddate' => 'required',
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
           $event->description = $request->tagline;
           $event->user_id = Auth::user()->id;
           $event->interest = $request->mcguffin;
           $event->group_id = $request->group_id;
           $event->start_date = $request->startdate;
           $event->end_date = $request->startdate;
           $event->image = $name;
           $event->type = $request->type;
           $event->sponsor = $request->sponsor;
           $event->zip_code = $request->zip;
           $event->attendance = $request->attendance;

           if($event->save()){
            $events = Event::with('user')->with('group')->orderby('id','desc')->paginate(15);
               return  view('frontend.pages.events',compact('events'));
           }else{
               return back()->with('message','Something Went Wrong');
           }


    }

    public function eventDetail(Request $request){

        $id = $request->id;

        $event = Event::where('id',$id)->first();
        $status = "";
        $event_status = BookEvent::where([['participent_id','=',Auth::user()->id],['event_id','=',$event->id]])->exists();
        if($event_status == "true"){

            $status = "JOINED";

        }else{

            $status = "JOIN";

        }
        $participents= BookEvent::where('event_id',$id)->with('participents')->get();
        $num_participent = $participents->count();
        return view('frontend.pages.event',compact('event','participents','status','num_participent'));

    }

    public function bookEvent($id){
        $event = Event::with('group')->where('id',$id)->first();
        $participants= BookEvent::where('event_id',$id)->with('participents')->get();
        return view('frontend.pages.bookevent',compact('event','participants'));

    }

    public function eventBooking(Request $request){

        $exists = BookEvent::where(['participent_id'=>Auth::user()->id,'event_id'=>$request->event_id])->first();
        $booked = "";
       if(empty($exists)){
            $booked=BookEvent::create(['participent_id'=>Auth::user()->id,'event_id'=>$request->event_id,'event_title'=>$request->event_title]);
        }else{

            $booked = "You Alreay Participent OF This Happenging";
        }

        $events = Event::where('user_id',Auth::user()->id)->with('user')->with('group')->orderby('id','desc')->paginate(15);
        return view('frontend.pages.events',compact('events','booked'));

    }



}
