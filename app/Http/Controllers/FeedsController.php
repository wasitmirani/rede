<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Models\User;
use App\Models\Event;
use App\Models\Group;
use App\Models\Comment;
use App\Models\FeedLike;
use App\Models\MyInterest;
use Illuminate\Support\Str;
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
        $interests = MyInterest::where('user_id',Auth::user()->id)->first();


        $interest = ($interests != null) ? $interests->interest : '';

        $comments = Comment::with('user')->get();
        $follower = FollowRequest::with('followings')->where([['follower','=',Auth::user()->id],['status','=',1]])->get();

        $following = FollowRequest::with('followersreq')->where([['following','=',Auth::user()->id],['status','=',0]])->get();

        $NotFollowing = MyInterest::with('users')->where([['interest','=',$interest],['user_id','!=',Auth::user()->id]])->get();

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

    return view('frontend.pages.messenger.index',compact('posts','feeds','users','follower','following','totalPost','comments','NotFollowing'));
    }



    public function feeds(){

        return view('frontend.pages.feeds');
    }


    public function storeFeed(Request $request){

         $feed = new Feed;
         if ($request->hasfile('image')) {
            $name = !empty($request->post) ? $request->post : config('app.name');

            $name = Str::slug($name, '-')  . "-" . time() . '.' . $request->image->extension();
            $request->image->move(public_path("/user/post/images/"), $name);


        }else{
            $name = "";
        }
         $feed->feed = $request->post;
         $feed->user_id =  Auth::user()->id;
         $feed->image = $name;
         $posted = $feed->save();
         $post = Feed::orderBy('id', 'desc')->first();

         if($posted){

            $data = Feed::with('user')->get();
            $post = collect($data)->last();

            return response()->json($post);


         }else{
             return response()->json('Failed To Post');

         }

    }

    public function follow_request(Request $request){
  // check post already liked

  $follower = FollowRequest::where([['follower','=',Auth::user()->id],['following','=',$request->following],['status','=',1]])->exists();
  $requested = FollowRequest::where([['follower','=',Auth::user()->id],['following','=',$request->following],['status','=',0]])->exists();


       if($follower){

       $disliked =  FollowRequest::where([['follower','=',Auth::user()->id],['following','=',$request->following]])->delete();
       return response()->json('Following');


       }elseif($requested){

       $disliked =  FollowRequest::where([['follower','=',Auth::user()->id],['following','=',$request->following]])->delete();
       return response()->json('Follow');


       }

       else{
           $liked = FollowRequest::create(['follower'=>Auth::user()->id,'following'=>$request->following]);
            return response()->json('Requested');


       }
    }

    public function followRequestAccepted(Request $request){

        $requested = FollowRequest::where([['following','=',Auth::user()->id],['follower','=',$request->id],['status','=',0]])->first();

       $accepted = $requested->update(['status'=>1]);
       if($accepted){

        return response()->json('Following');

       }

    }


    public function likeFeed(Request $request){

            // check post already liked
            $exist = FeedLike::where([['user_id','=',Auth::user()->id],['post_id','=',$request->id]])->exists();
            // if liked than dislike or delete
                 if($exist){

                 $disliked = FeedLike::where([['user_id','=',Auth::user()->id],['post_id','=',$request->id]])->delete();

                 return response()->json('Like');

                 }
                 //else like the post
                 else{
                     $liked = FeedLike::create(['user_id'=>Auth::user()->id,'post_id'=>$request->id]);
                    return response()->json('dislike');


                 }


    }


    public function showMore(Request $request){

        $comments = Comment::with('user')->where('post_id',$request->id)->get();
        return response()->json($comments);



    }

    public function searchPeople(Request $request){

        $result = MyInterest::with('users')->where('interest',$request->keyword)->get();
        $groups = Group::where('interest',$request->keyword)->get();
        $events = Event::where('interest',$request->keyword)->get();


        return  view('frontend.pages.searchresult',compact('result','events','groups'));



    }

    public function showMember($id){

        $member = User::with('interests')->where('id',$id)->first();

        return view('frontend.pages.showuser',compact('member'));

    }






}
