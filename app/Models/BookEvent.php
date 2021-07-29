<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookEvent extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function participents(){
        return $this->belongsTo(User::class,'participent_id','id');
    }

    public static function bookingStatus($id){

        $exists = BookEvent::where([['participent_id','=',Auth::user()->id],['event_id','=',$id]])->exists();
        if($exists){

            return 'Joined';
        }else if(!$exists){
            return 'Join';
        }


    }
}
