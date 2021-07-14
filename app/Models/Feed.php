<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;

class Feed extends Model
{
    use HasFactory;


    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function comments(){
        return $this->hasMany(Comment::class,'post_id','id');
    }








}
