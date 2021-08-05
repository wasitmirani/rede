<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MyInterest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\FollowRequest;
use Illuminate\Support\Facades\Auth;


class UserDetailController extends Controller
{
    public function profileSetting(){

        $user = User::find(Auth::user()->id);
        $interests = MyInterest::where('user_id',Auth::user()->id)->get();


        return view('frontend.pages.profile',compact('user','interests'));

    }

    public function editProfile(Request $request){


        $user = User::where('id',Auth::user()->id)->first();

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
        $followingList = FollowRequest::with('followings')->where('follower',$id)->get();
        $followerslist = FollowRequest::with('followersreq')->where('following',$id)->get();
        $follower = "";


        $following =  FollowRequest::where('follower',$id)->count();
        $myInterests = User::with('interests')->where('id',Auth::user()->id)->get();
        return view('frontend.pages.myProfile',compact('myInterests','following','followers','followerslist','followingList'));
    }

    public function editMyInterest(Request $request){


        $interest = MyInterest::where('user_id',Auth::user()->id)->delete();
        $updated = '';
     $count = count($request->interests);
     foreach($request->interests as $interest){

        $updated = MyInterest::create([
             'user_id' => Auth::user()->id,
            'interest' => $interest
        ]);


    }


if($updated){

    return response()->json('Interest Update Successfully');

}else{
    return response()->json('Something Went Wrong');

}



    }

    public function editEvent(Request $request){

        return response()->json($request->all());

    }

    public function friendlist(){
        return view('frontend.pages.friendlist');
    }

    public function myCalendar(){
        return view('frontend.pages.calendar');
    }

    public function updateImage(Request $request){

        $user = User::find(Auth::user()->id);
        if ($request->hasfile('image')) {
            $name = !empty($request->post) ? $request->post : config('app.name');
            $name = Str::slug($name, '-')  . "-" . time() . '.' . $request->image->extension();
            $request->image->move(public_path("/user/images/"), $name);
        }
        else{
            $name = "";
        }

        $user->image = $name;
        $updated = $user->save();
        if($updated){

            return response()->json('200');
        }else{
            return response()->json('402');
        }






    }

    public function spinTheWheel(){
        return view('frontend.pages.wheel');
    }
}
