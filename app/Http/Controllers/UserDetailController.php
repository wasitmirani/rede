<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FollowRequest;


class UserDetailController extends Controller
{
    public function profileSetting(){

        $user = User::find(1);

        return view('frontend.pages.profile',compact('user'));

    }

    public function editProfile(Request $request){


        $user = User::where('id',1)->first();

        if ($request->hasfile('image')) {
            $name = !empty($request->title) ? $request->title : config('app.name');

            $name = Str::slug($name, '-')  . "-" . time() . '.' . $request->image->extension();
            $request->image->move(public_path("/user/images/"), $name);

            $user->image = $name;

        }else{
            $user->image = $request->old_image;

        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->username = $request->username;

        if($user->save()){
            return back()->with('message','Profile Updated');
        }else{
            return back()->with('message','Failed To Update Profile');

        }

    }

    public function myProfile(){
        $id = Auth::user()->id;
        $followers = FollowRequest::where('following',$id)->get()->count();

        $following =  FollowRequest::where('follower',$id)->count();

        $myInterests = User::with('interests')->where('id',Auth::user()->id)->get();

        return view('frontend.pages.myProfile',compact('myInterests','following','followers'));
    }
}
