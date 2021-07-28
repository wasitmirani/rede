<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GroupMember extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function members(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public static function joinStatus($id){
        $exist = GroupMember::where([['user_id','=',Auth::user()->id],['group_id','=',$id]])->exists();
         if($exist){

            return 'Joined';

         }else{
             return 'Join';
         }

        }







}
