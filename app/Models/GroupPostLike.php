<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GroupPostLike extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function groupLikeStatus($group_id,$post_id){
        $exist = GroupPostLike::where([['user_id','=',Auth::user()->id],['group_id','=',$group_id],['post_id','=',$post_id]])->exists();
         if($exist){

            return 'Liked';

         }else{
             return 'Like';
         }

    }
}
