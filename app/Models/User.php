<?php

namespace App\Models;

use Hootlex\Friendships\Traits\Friendable;
use App\Models\Feed;
use App\Models\Interest;
use App\Models\BookEvent;
use App\Models\UserDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Friendable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $guarded=[];

    //  protected $cast = [

    //     'pass_key' => 'array', // Will convarted to (Array)
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   public function profile(){
       return $this->hasOne(UserDetail::class,'user_id','id');
   }
    public function interests(){

        return $this->hasMany(MyInterest::class);
    }

    // public function followers()
    // {
    //     return $this->hasMany(FollowRequest::class, 'following', 'id');
    // }

    public function followers(){
        $id = Auth::user()->id;
        $followersList = DB::table('users')
                              ->join('friendships', 'users.id','=','friendships.sender_id')
                              ->where('users.id',$id)
                              ->get();
        return $followersList;

     }

    public function following()
    {
        $id = Auth::user()->id;
        $followersList = DB::table('users')
                              ->join('friendships', 'users.id','=','friendships.recipient_id')
                              ->where('users.id',$id)
                              ->get();
        return $followersList;

        // return $this->hasMany(FollowRequest::class, 'follower', 'id');
    }
    public function feeds(){
        return $this->hasMany(Feed::class)->orderBy('id','desc');
    }

    public function bookedevents(){
        return $this->hasMany(BookEvent::class);
    }

    public static function followStatus($id){

        $exist = FollowRequest::where([['follower','=',Auth::user()->id],['following','=',$id]])->exists();
        if($exist){
            return 'Unfollow';

        } else if(!$exist){
            return 'Follow';


        }

    }




}
