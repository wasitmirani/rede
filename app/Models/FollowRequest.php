<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Feed;


class FollowRequest extends Model
{
    use HasFactory;

    protected $table = "follow_requests";

    protected $guarded = [];

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









}
