<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Particular extends Model
{
    use HasFactory;
    protected  $guarded = [];

    public function details(){
        return $this->hasMany(ParticularDetail::class,'particular_id','id');
    }

}
