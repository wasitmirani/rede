<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class MyInterest extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }






}
