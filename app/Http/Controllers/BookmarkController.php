<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Event;
use App\Models\Group;
use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{

    public function createBookmark($name){

        $mcguffins = User::where('id',Auth::user()->id)->with('interests')->first()->interests;
        $circles = Group::where('user_id',Auth::user()->id)->get();
        $happenings = Event::where('user_id',Auth::user()->id)->get();
        $bookmark = $name;
        return view('frontend.pages.addbookmark',compact('bookmark','mcguffins','circles','happenings'));
    }
    public function myBookmarks(){

        $id = Auth::user()->id;
        $bookmarks = Bookmark::all();
        $events = Event::with('user')->where('user_id',$id)->get();
        $groups = Group::with('members')->where('user_id',$id)->get();
        // $follower = "";
        $myInterests = User::with('interests')->where('id',Auth::user()->id)->get();
        return view('frontend.pages.mybookmark',compact('bookmarks','events','groups','myInterests'));

    }

    public function addBookmarks(Request $request){

        $exist = Bookmark::where([['user_id','=',$request->participent],['item_id','=',$request->bookmark]])->exists();

    if(!$exist){
        $bookmark = BookMark::create([
            'title'=>$request->title,
            'item_id' => $request->bookmark,
            'user_id' => Auth::user()->id
        ]);


        if($bookmark){

            return response()->json('200');

        }else{

            return response()->json('Something Went Wrong');

        }

    }else if($exist){

        return response()->json('300');

    }


    }
}
