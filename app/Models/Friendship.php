<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Friendship extends Model
{
    use HasFactory;

    public function user(){

        $users = Friendship::where([['sender_id' ,'!=',Auth::user()->id],['recipient_id','!=',Auth::user()->id]])->with('userData')->get();
        return $users;

    }

    public function friendshipStatus($id){

        $sender_id = $id;
        $recipient_id = $id;

        $requested = Friendship::where([['sender_id','=',Auth::user()->id],['recipient_id','=',$id],['status','=',0]])->exists();
        $following = Friendship::where([['sender_id','=',Auth::user()->id],['recipient_id','=',$id],['status','=',1]])->exists();
        $follow_req = Friendship::where([['sender_id','=',$id],['recipient_id','=',Auth::user()->id],['status','=',0]])->exists();
        $follower = Friendship::where([['sender_id','=',$id],['recipient_id','=',Auth::user()->id],['status','=',1]])->exists();

        switch(true){
            case $requested:
                return "Requested";
                break;
            case $following:
                return "Following";
                break;
            case $follow_req:
                return "Follow Request";
                break;
            case $following:
                return "Follower";
                break;

        }



    }

    public function userData(){
        return $this->belongsTo(User::class,'sender_id','id');
    }


}


