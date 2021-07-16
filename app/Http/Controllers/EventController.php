<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index(){
        $events = Event::with('user')->with('group')->get();
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

            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'image' => 'required',
            'interest' => 'required'


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

               return response()->json('Event Create');
           }else{
               return response()->json('Something Went Wrong');
           }





    }

    public function eventDetail(Request $request){

        $id = $request->id;
        $event = Event::where('id',$id)->first();
        return view('frontend.pages.detail',compact('event'));

    }
}
