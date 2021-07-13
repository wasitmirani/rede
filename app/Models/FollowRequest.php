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

    function followerPost(){
        return $this->hasMany(Feed::class,'user_id','following');
    }

}
