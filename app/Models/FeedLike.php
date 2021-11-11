<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeedLike extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function feed(){
        return $this->belongsTo(Feed::class);
    }

    public function like($id){
     // check post already liked
        $exist = FeedLike::where([['user_id','=',Auth::user()->id],['post_id','=',$id]])->exists();
   // if liked than dislike or delete
        if($exist){

        $disliked = FeedLike::where([['user_id','=',Auth::user()->id],['post_id','=',$id]])->delete();
        return response()->json('Like');

        }
        //else like the post
        else{
            $liked = FeedLike::create(['user_id'=>Auth::user()->id,'post_id'=>$id]);
           return response()->json('dislike');
        }

    }

    public static function likeStatus($id){
        $exist = FeedLike::where([['user_id','=',Auth::user()->id],['post_id','=',$id]])->exists();
         if($exist){

            return 'dislike';

         }else{
             return 'Like';
         }

    }
}
