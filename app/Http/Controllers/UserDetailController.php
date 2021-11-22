<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Group;
use App\Models\Privacy;
use App\Models\Friendship;
use App\Models\MyInterest;
use App\Models\UserDetail;
use App\Models\GroupMember;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\FollowRequest;
use Illuminate\Support\Facades\Auth;


class UserDetailController extends Controller
{
    public function profileSetting(){

        $user = User::with('profile')->find(Auth::user()->id);
        $interests = MyInterest::where('user_id',Auth::user()->id)->get();
        $privacy = Privacy::where('user_id',Auth::user()->id)->first();
        return view('frontend.pages.profile',compact('user','privacy'));

    }

    public function editProfile(Request $request){


        $user = User::where('id',Auth::user()->id)->first();
        $user_detail = UserDetail::where('user_id',Auth::user()->id)->first();

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

        $social=[
            'facebook'=>$request->fb,
            'twitter'=>$request->twitter,
            'google_plus'=>$request->google_plus,
        ];

        $user_detail->user_id = $user->id;
        $user_detail->social = json_encode($social);
        $user_detail->zip_code = $request->zip;
        $user_detail->covid_status = $request->covid_status;
        $user_detail->pronouns = $request->pronouns;

        $user_detail->gender = $request->gender;
        $user_detail->save();


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
        $followers = $user->followers();
        // $followers = FollowRequest::where('following',$id)->get()->count();
        // $followingList = FollowRequest::with('followings')->where('follower',$id)->get();
        $events = Event::with('user')->where('user_id',$id)->get();
        $groups = GroupMember::with('group')->where('user_id',$id)->get();


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
        $user = User::find($id)->first();
        // $sender; = User::
        $suggestion = new Friendship;
        $crews = $suggestion->user();
        $requests = $user->getFriendRequests()->pluck('sender_id');
        $follow_reqs = Friendship::where([['recipient_id','=',Auth::user()->id],['status','=',0]])->with('userData')->get();
        $followerslist  = $user->getAcceptedFriendships()->pluck('recipient_id');
        $followers = User::wherein('id',$followerslist)->get();
        // $followerslist = FollowRequest::with('followersreq')->where([['following','=',$id],['status','=',1]])->get();
        return view('frontend.pages.friendlist',compact('crews','followers','follow_reqs'));
    }

    public function myCalendar()
    {
        $events = Event::where('user_id',Auth::user()->id)->with('user')->with('group')->orderBy('created_at','desc')->paginate(5);
        return view('frontend.pages.calendar',compact('events'));
    }

    public function updateImage(Request $request){

        $user = User::find(Auth::user()->id);
        if ($request->hasfile('image')) {
            $name = !empty($request->post) ? $request->post : config('app.name');
            $name = Str::slug($name, '-')  . "-" . time() . '.' . $request->image->extension();
            $request->image->move(public_path("/user/images/"), $name);
        }
        else{
            $name = 'dummyuser.jpg';
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
        $followerslist  = $user->getAcceptedFriendships()->pluck('sender_id');
        $followers = User::wherein('id',$followerslist)->get();
        // $followers = FollowRequest::where('following',$id)->get()->count();
        // $followingList = FollowRequest::with('followings')->where('follower',$id)->get();
        $events = Event::with('user')->where('user_id',$id)->get();
        $groups = GroupMember::with('group')->where('user_id',$id)->get();
        // $follower = "";
         $myInterests = User::with('interests')->where('id',Auth::user()->id)->get();
         $ind = UserDetail::where('user_id',Auth::user()->id)->first();
         $ind->description = $request->description;
         $updated = $ind->save();

         if($updated){
            return view('frontend.pages.myProfile',compact('myInterests','user','profile','groups','events'));
         }else{
             return back()->with('message','Your Story Updated');
         }

    }

    public function publicProfile($id){

        $user = User::where('id',$id)->with('profile','feeds','interests')->orderBy('id','desc')->first();
        $followerslist  = $user->getAcceptedFriendships()->pluck('sender_id');
        $followers = User::wherein('id',$followerslist)->count();
        $feeds = $user->feeds;

        $profile = $user->profile;
        return view('frontend.pages.publicprofile',compact('user','followers','feeds','profile'));

    }


    public function privacySetting(Request $request){



        $pivacy = Privacy::updateOrCreate(
        [
            'user_id'   => Auth::user()->id,
        ],
        [
             'show_covid_status' => !empty($request->covid_switch) ? $request->covid_switch : $privacy->show_covid_status,
             'show_age' => $request->age_switch,
             'show_pronouns' => $request->pronouns_switch
        ]);


        return response()->json('Privacy Updated');
    }

    public function acceptRequest($id){

        $recipient = User::find('id',Auth::user()->id)->first();
        $recipient_id = $recipient->id;
        $sender = User::find($id)->first();
        $user = User::find($recipient_id);
        $accepted = $user->acceptFriendRequest($sender);
        return redirect()->back();

    }
}
