<?php

namespace App\Models;

use App\Models\User;
use App\Models\Group;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GroupPost extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function group(){
        return $this->belongsTo(Group::class);
    }



    public function member(){

        return $this->belongsTo(User::class,'user_id','id');
    }

}
