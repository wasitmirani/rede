<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Tag;
use App\Models\Feed;

class Interest extends Model
{
    use HasFactory;

    public function users(){

        return $this->belongsToMany(User::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

   
}
