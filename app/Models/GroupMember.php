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


    public function group(){
        return $this->belongsTo(Group::class,'group_id','id');
    }



    public static function joinStatus($id){
        $joined = GroupMember::where([['user_id','=',Auth::user()->id],['group_id','=',$id],['status','=',1]])->exists();
        $requested = GroupMember::where([['user_id','=',Auth::user()->id],['group_id','=',$id],['status','=',0]])->exists();
         if($joined){

            return 'Joined';

         }else if($requested){
            return 'Requested';

         }else{
             return 'Join';
         }

        }







}
