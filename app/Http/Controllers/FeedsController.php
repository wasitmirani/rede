<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Models\User;
use App\Models\Comment;
use App\Models\MyInterest;
use Illuminate\Http\Request;
use App\Models\FollowRequest;
use Illuminate\Support\Facades\Auth;

class FeedsController extends Controller
{

    public function newFeeds(){

        // $follower = FollowRequest::where('follower',Auth::user()->id)->get();
        $followerId = FollowRequest::where('following',Auth::user()->id)->get();
        $posts = '';
        $users = '';
        $totalPost = Feed::where('user_id',Auth::user()->id)->count();
        $comments = Comment::with('user')->get();
        $follower = FollowRequest::with('followersreq')->where('following','=',Auth::user()->id)->get();
        $following = FollowRequest::with('followings')->where('follower','=',Auth::user()->id)->get();
        $NotFollowing = FollowRequest::with('followersreq')->with('followings')->groupBy('following')->where([['following','!=',Auth::user()->id],['follower','!=',Auth::user()->id]])->take(5)->get();
        $feeds = FollowRequest::with('posts')->with('postComments')->with('followersreq')->where('follower','=',Auth::user()->id)->orWhere('following','=',Auth::user()->id)->get();
       if(!$followerId){

        foreach($followerId  as $fid){
            $users = User::where([['id','!=',$fid->following],['id','!=',Auth::user()->id]])
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

    return view('frontend.pages.messenger.index',compact('posts','feeds','users','follower','totalPost','comments','NotFollowing'));
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


    public function showMore(Request $request){

        $comments = Comment::with('user')->where('post_id',$request->id)->get();
        return response()->json($comments);



    }

    public function searchPeople(Request $request){

        $result = MyInterest::with('users')->where('interest',$request->keyword)->get();


        return  view('frontend.pages.searchresult',compact('result'));



    }

    public function showMember($id){

        $member = User::with('interests')->where('id',$id)->first();

        return view('frontend.pages.showuser',compact('member'));

    }




}
