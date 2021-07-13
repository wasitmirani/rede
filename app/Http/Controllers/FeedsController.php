<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\FollowRequest;

class FeedsController extends Controller
{
    //
    public function newFeeds(){

        $users = User::latest()->get();
        $posts = Feed::where('user_id',Auth::user()->id)->orderby('id','desc')->get();
        $follower = FollowRequest::where('following',Auth::user()->id)->get();

        return view('frontend.pages.messenger.index',compact('posts','users','follower'));
    }
    public function feeds(){
        return view('frontend.pages.feeds');
    }


    public function storeFeed(Request $request){

         $feed = new Feed;
         $feed->feed = $request->post;
         $feed->user_id =  Auth::user()->id;
         $posted = $feed->save();
         $post = Feed::orderBy('id', 'desc')->first();

         if($posted){

            return response()->json($post);

         }else{
             return response()->json('Failed To Post');

         }

    }

    public function follow_request(Request $request){

        $request = FollowRequest::create([
            'following' => $request->following,
            'follower' => $request->follower,
            'status' => $request->status,
        ]);

        if($request){

            return response()->json("Following");

        }else{
            return '';
        }

    }
}
