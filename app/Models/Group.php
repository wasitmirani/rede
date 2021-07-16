<?php

namespace App\Models;

use App\Models\GroupPost;
use App\Models\GroupMember;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function members(){
        return $this->hasMany(GroupMember::class,'group_id','id');
    }

    public function posts(){
        return $this->hasMany(GroupPost::class,'group_id','id');
    }
}
