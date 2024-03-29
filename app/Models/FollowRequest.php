<?php

namespace App\Models;

use App\Models\Feed;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class FollowRequest extends Model
{
    use HasFactory;

    protected $table = "follow_requests";

    protected $guarded = [];



// Request Sender = Follower
// Request Send To = Following

    public function followersreq(){
        return $this->belongsTo(User::class,'follower','id');
    }

    public function followings(){
        return $this->belongsTo(User::class,'follower','id');
    }

    public function posts(){
        return $this->hasMany(Feed::class,'user_id','follower');
    }

    public function postComments(){
        $comment = new Feed();
        return $comment->comments();

    }

    public function follow($id){

           $exist = FollowRequest::where([['follower','=',Auth::user()->id],['following','=',$id]])->exists();

           if($exist){

           $disliked =  FollowRequest::where([['follower','=',Auth::user()->id],['following','=',$id]])->delete();
           return response()->json('Follow');

           }
           //else like the post
           else{
               $liked = FollowRequest::create(['follower'=>Auth::user()->id,'following'=>$id]);
              return response()->json('Following');


           }

       }


       public static function followStatus($id){


        $friend = User::find($id)->first();
        $user = User::where('id',Auth::user()->id)->first();

        if($friend->isFriendWith($user)){
            return 'Following';

        }else{
            return 'Follow';


        }

        // $follower = FollowRequest::where([['following','=',Auth::user()->id],['follower','=',$id],['status','=',1]])->exists();
        // $requested = FollowRequest::where([['following','=',Auth::user()->id],['follower','=',$id],['status','=',0]])->exists();

        //  if($follower){

        //     return 'Following';

        //  }else if($requested){
        //      return 'Follow';
        //  }
        // //  }else{
        // //      return "Follow";
        // //  }

    }









}
