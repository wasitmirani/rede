<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Models\User;
use App\Models\Event;
use App\Models\Group;
use App\Models\Comment;
use App\Models\FeedLike;
use App\Models\Interest;
use App\Models\MyInterest;
use App\Models\UserDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\FollowRequest;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class FeedsController extends Controller
{

    public function newFeeds(){


        // $follower = FollowRequest::where('follower',Auth::user()->id)->get();
        // $followerId = FollowRequest::where('following',Auth::user()->id)->get();
        $posts = '';
        $users = '';
        // $totalPost = Feed::where('user_id',Auth::user()->id)->count();
        //get comments
        $comments = Comment::with('user')->get();
        //getfollowers
        $follower = FollowRequest::with('followings')->where([['following','=',Auth::user()->id],['status','=',1]])->get();
        //get following
        $following = FollowRequest::with('followings')->where([['follower','=',Auth::user()->id],['status','=',1]])->get();
        //get follow request
        $followReq = FollowRequest::with('followersreq')->where([['following','=',Auth::user()->id],['status','=',0]])->get();
        $mcguffins = User::where('id',Auth::user()->id)->with('interests')->first();

        //get suggestions
        $NotFollowing = $this->followSugest();
        // $feeds = FollowRequest::with('posts')->with('postComments')->with('followersreq')->where('follower','=',Auth::user()->id)->orWhere('following','=',Auth::user()->id)->get();
        //list of posts posted by user. follower and who are following
        $posts = $this->posts();
        return view('frontend.pages.messenger.index',compact('posts','users','follower','following','comments','NotFollowing','followReq','mcguffins'));
    }
    public function feeds(){

        return view('frontend.pages.feeds');
    }

    public function news(){
        $feeds = Feed::where('user_id','=',Auth::user()->id)->get();
    }

public function storeFeed(Request $request){

         $feed = new Feed;
         if ($request->hasfile('image')) {
            $name = !empty($request->post) ? $request->post : config('app.name');
            $name = Str::slug($name, '-')  . "-" . time() . '.' . $request->image->extension();
            $request->image->move(public_path("/user/post/images/"), $name);
        }
        else{
            $name = "";
        }

         $feed->feed = $request->post;
         $feed->user_id =  Auth::user()->id;
         $feed->interest = json_encode($request->interest);
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
        // check follower exist
        // $follower = FollowRequest::where([['follower','=',$request->following],['following','=',Auth::user()->id],['status','=',1]])->exists();

        // check check any follow request exists
        // $requested = FollowRequest::where([['follower','=',$request->following],['following','=',Auth::user()->id],['status','=',0]])->exists();
        // if($follower){
        //     $disliked =  FollowRequest::where([['following','=',Auth::user()->id],['follower','=',$request->following],['status','=',1]])->delete();
        //     return response()->json('Follow');
        // }
        // elseif($requested){
            // $disliked =  FollowRequest::where([['following','=',Auth::user()->id],['follower','=',$request->following]])->delete();
            // return response()->json('Follow');
        // }
        // else{
        //    $liked = FollowRequest::create(['following'=>Auth::user()->id,'follower'=>$request->following,'status'=> 0]);
        $follower = FollowRequest::where([['follower','=',$request->following],['following','=',Auth::user()->id],['status','=',1]])->exists();
        $status = "";
        if($follower){
            $unfollow =  FollowRequest::where([['following','=',Auth::user()->id],['follower','=',$request->following]])->delete();
            $status = "Follow";
        }else{
            $liked = FollowRequest::create(['following'=>Auth::user()->id,'follower'=>$request->following,'status'=> 1]);
            $status = "Following";

        }
        return response()->json($status);


        // }
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

        $interests = Interest::all();
        $users = MyInterest::with('user')->where('interest','LIKE',"%$request->interest%")->get();
        $data = UserDetail::with('user')
        ->where('age','LIKE',"%$request->age%")
        ->orwhere('covid_status','LIKE',"%$request->covid_status%")
        ->get();

        $groups = Group::where('interest',$request->keyword)->get();
        $events = Event::where('interest',$request->keyword)->get();
        return  view('frontend.pages.searchresult',compact('users','events','groups','data','interests'));



    }

    public function searchForm(){
        $interests = Interest::all();
        return view('frontend.pages.searchresult',compact('interests'));
    }

    public function showMember($id){

        $member = User::with('interests')->where('id',$id)->first();
        return view('frontend.pages.showuser',compact('member'));

    }

    public function shareFeed(Request $request){

        $post = Feed::where([['user_id','=',$request->user_id],['id','=',$request->post_id]])->first();


        $feed = new Feed;
        $feed->feed = $post->feed;
        $feed->user_id = $post->user_id;
        $feed->image = $post->image;
        $feed->share_id = $request->share_id;
        $posted = $feed->save();
        $post = Feed::orderBy('id', 'desc')->first();


        if($posted){

            $data = Feed::with('user')->with('feedShareBy')->get();
            $post = collect($data)->last();

            return response()->json($post);


         }else{
             return response()->json('Failed To Post');

         }





    }



    public function followSugest(){

        $interests = MyInterest::where('user_id',Auth::user()->id)->first();
        $interest = ($interests != null) ? $interests->interest : '';
        $sugestion = MyInterest::with('users')->where([['interest','=',$interest],['user_id','!=',Auth::user()->id]])->get();
        return $sugestion;


    }


    public function posts(){

        $user = User::with('followers','following')->find(Auth::user()->id);
        $followerid = $user->followers()->pluck('follower')->toArray();
        $followingids = $user->following()->pluck('following')->toArray();
        $userIds = array_merge($followerid, $followingids);
        $fooeds = Feed::with('user')->with('comments')->with('feedShareBy')->with('user')->whereIn('user_id',$userIds)->orwhere('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
        return $fooeds;
    }


    public function myNews(){
        $user = User::with('followers','following')->find(Auth::user()->id);
        $followerid = $user->followers()->pluck('follower')->toArray();
        $followingids = $user->following()->pluck('following')->toArray();
        $userIds = array_merge($followerid, $followingids);

        $posts = Feed::with('user')->with('comments')->whereIn('user_id',$userIds)->orwhere('user_id','=',Auth::user()->id)->orderBy('created_at','desc')->get();
        
      return view('frontend.pages.feeds',compact('posts'));
    }






}
