<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Group;
use App\Models\MyInterest;
use App\Models\UserDetail;
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
        $user = User::with('profile')->where('id',$id)->first();
        $profile = $user->profile;
        // $followers = FollowRequest::where('following',$id)->get()->count();
        // $followingList = FollowRequest::with('followings')->where('follower',$id)->get();
        $followerslist = FollowRequest::with('followersreq')->where('following',$id)->get();
        $events = Event::with('user')->where('user_id',$id)->get();
        $groups = Group::with('members')->where('user_id',$id)->get();
        // $follower = "";
        $myInterests = User::with('interests')->where('id',Auth::user()->id)->get();
        return view('frontend.pages.myProfile',compact('myInterests','user','profile','groups','events'));
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
        $id = Auth::user()->id;
        $followerslist = FollowRequest::with('followersreq')->where('following',$id)->get();

        $crews = User::with('profile')->get();

        return view('frontend.pages.friendlist',compact('crews','followerslist'));
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

    public function updateStory(Request $request){

        $id = Auth::user()->id;
        $user = User::with('profile')->where('id',$id)->first();
        $profile = $user->profile;
        // $followers = FollowRequest::where('following',$id)->get()->count();
        // $followingList = FollowRequest::with('followings')->where('follower',$id)->get();
        $followerslist = FollowRequest::with('followersreq')->where('following',$id)->get();
        $events = Event::with('user')->where('user_id',$id)->get();
        $groups = Group::with('members')->where('user_id',$id)->get();

        $myInterests = User::with('interests')->where('id',Auth::user()->id)->get();

         $ind = UserDetail::where('user_id',Auth::user()->id)->first();
         $ind ->description = $request->description;
         $updated = $ind->save();

         if($updated){
            return view('frontend.pages.myProfile',compact('myInterests','user','profile','groups','events'));
         }else{
             return back()->with('message','Your Story Updated');
         }






    }
}
