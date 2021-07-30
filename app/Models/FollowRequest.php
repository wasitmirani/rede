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
        return $this->belongsTo(User::class,'following','id');
    }

    public function posts(){
        return $this->hasMany(Feed::class,'user_id','follower');
    }

    public function postComments(){
        $comment = new Feed();
        return $comment->comments();

    }

    public function follow($id){
        // check post already liked
           $exist = FollowRequest::where([['follower','=',Auth::user()->id],['following','=',$id]])->exists();
      // if liked than dislike or delete
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
        $follower = FollowRequest::where([['following','=',Auth::user()->id],['follower','=',$id],['status','=',1]])->exists();
        $requested = FollowRequest::where([['following','=',Auth::user()->id],['follower','=',$id],['status','=',0]])->exists();
         if($follower){

            return 'Follower';

         }else if($requested){
             return 'Requested';
         }else{
             return "Follow";
         }

    }









}
