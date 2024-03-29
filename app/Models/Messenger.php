<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messenger extends Model
{
    use HasFactory;

    protected $guarded=[];
    public function conversation(){
        return  $this->belongsTo(Conversation::class, 'conversation_id', 'id')->with(['getUser1:id,name,email','getUser2:id,name,email']);
    }

    public function messages($conversation_id){
        return Messenger::orderBy('id','ASC')->where('conversation_id',$conversation_id)->get();
    }
}
