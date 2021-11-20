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

    public function feeds(){
        return $this->belongsToMany(Feed::class,'feed_myinterest','myinterest_id','feed_id');
    }

    public function interests(){
        return $this->belongsTo(Interest::class,'interest_id','id');
    }






}
