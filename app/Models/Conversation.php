<?php

namespace App\Models;

use Auth;
use App\Models\Messenger;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conversation extends Model
{
    use HasFactory;

    public function getUser1(){
        return  $this->belongsTo(User::class, 'user_1', 'id');
    }

    public function getUser2(){
        return  $this->belongsTo(User::class, 'user_2', 'id');
    }
    public function message(){
        return  $this->belongsTo(Messenger::class, 'id', 'conversation_id')->latest();
    }
    public function getConversations(){
        $auth_user=Auth::user();
        $user1=Conversation::latest()->where('user_1',$auth_user->id)->with(['message','getUser1','getUser2'])->get();
        $user2=Conversation::latest()->where('user_2',$auth_user->id)->with(['message','getUser1','getUser2'])->get();
        $conversations=collect([$user1,$user2]);
        $conversations=$conversations->collapse();
        return $conversations;
    }

    public function getLatestMessage(){
        $auth_user=Auth::user();
        $messages1=Messenger::latest()->with('conversation')->where(['sender_id'=>$auth_user->id])->get();
        $messages2=Messenger::latest()->with('conversation')->where(['receiver_id'=>$auth_user->id])->get();

        $messages=collect([$messages1,$messages2]);
        $messages=$messages->collapse();
        return $messages;
    }

}
