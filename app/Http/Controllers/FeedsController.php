<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\FollowRequest;
use App\Models\Comment;

class FeedsController extends Controller
{

    public function newFeeds(){

        $follower = FollowRequest::where('follower',Auth::user()->id)->get();
        $followerId = FollowRequest::where('follower',Auth::user()->id)->get();
        $posts = '';
        $users = '';


       if(!$followerId){

        foreach($followerId  as $fid){
            $users = User::where([['id','!=',Auth::user()->id],['id','!=',$fid->following]])
            ->orderby('id','desc')
            ->get();
        }
        foreach($followerId  as $fid){
            $posts = Feed::with('user')->with('comments')->where('user_id','=',Auth::user()->id)->orWhere('user_id','=',$fid->following)->orderBy('id','desc')
            ->get();

        }

       }else{
        $users = User::where('id','!=',Auth::user()->id)
        ->orderby('id','desc')
        ->get();
        $posts = Feed::with('user')->with('comments')->where('user_id','=',Auth::user()->id)->orderBy('id','desc')
        ->get();

    }







        $comments = Comment::with('user')->get();
        $totalPost = Feed::where('user_id',Auth::user()->id)->count();
        return view('frontend.pages.messenger.index',compact('posts','users','follower','totalPost','comments'));
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
        $user = FollowRequest::where([['following','=',$request->following],['follower','=',$request->follower]])->count();
if($user == "0"){
    $requested = FollowRequest::create([
        'following' => $request->following,
        'follower' => $request->follower,
        'status' => $request->status,
    ]);


    if($requested){

        return response()->json("Following");

    }
}
    else{
            return response()->json('Alreading Following');
        }

    }


    public function likeFeed(Request $request){


           $update = Feed::where('id',$request->id)->update([
               'like_status' => 1,
               'liked_by' => $request->likedBy
           ]);

           if($update){

              return response()->json($update);

           }else{
               return response()->json('Failed To Like');
           }


    }




}
