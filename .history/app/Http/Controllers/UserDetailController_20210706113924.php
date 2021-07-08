<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->username = $request->username;

    }
}
