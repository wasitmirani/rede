<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\GroupPost;
use App\Models\GroupMember;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\FollowRequest;
use App\Models\GroupPostLike;
use App\Models\GroupPostComment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function index(){

        $groups = Group::orderBy('created_at','desc')->paginate(9);


        return view('frontend.pages.groups',compact('groups'));
    }

    public function createGroup(){
        $interests = User::where('id',Auth::user()->id)->with('interests')->first()->interests;
        return view('frontend.pages.creategroup',compact('interests'));
    }

    public function myCircle(){


        $user = User::with('profile')->where('id',Auth::user()->id)->first();

        $my_groups = GroupMember::with('group')->where('user_id',Auth::user()->id)->get();
        $followerslist  = $user->getAcceptedFriendships()->pluck('recipient_id');
        $followings = User::wherein('id',$followerslist)->get();

        // $followers = $user->followers();
        // $followings = FollowRequest::with('followings')->where('following',Auth::user()->id)->get();
        // $followers = FollowRequest::with('followers')->where('follower',Auth::user()->id)->get();
        return view('frontend.pages.my_circle',compact('my_groups','followings','user'));
    }

    public function storeGroup(Request $request){

        $validate = $request->validate([

            'title' => 'required',
            'tagline' => 'required',
            'type' => 'required',

           ]);

           if ($request->hasfile('image')) {
            $name = !empty($request->title) ? $request->title : config('app.name');
            $name = Str::slug($name, '-')  . "-" . time() . '.' . $request->image->extension();
            $request->image->move(public_path("/user/group/images/"), $name);


        }else{
            $name = "";
        }

           $group = new Group();
           $group->title = $request->title;
           $group->description = $request->tagline;
           $group->type = $request->type;
           $group->sponsor = $request->sponsor;
           $group->membership = $request->membership;
           $group->subscription =  $request->subscription;
           $group->zip_code = $request->zip;
           $group->user_id = Auth::user()->id;
           $group->interest = $request->mcguffin;
           $group->image = $name;

           if($group->save()){

            $data = Group::all();
            $last_group = collect($data)->last();
            $group_id = $last_group->id;

            GroupMember::create([
                'user_id' => Auth::user()->id,
                'group_id' => $group_id,
                'status' => 1
            ]);

            $groups = Group::orderBy('created_at','desc')->paginate(15);

            return view('frontend.pages.groups',compact('groups'));

           }else{
               return response()->json('Something Went Wrong');
           }



    }

    public function showGroup($id){


        $group = Group::with('members')->where('id',$id)->first();
        $posts = GroupPost::with('member')->orderBy('id','desc')->where('group_id',$id)->get();

        $comments = GroupPostComment::with('members')->where('group_id',$id)->orderBy('id','desc')->limit(3)->get();
        $likes = GroupPostLike::where('id',$id)->get();

        $status = $this->memberStatus($id);

        $member = $this->singleMember($id);
         $groupMembers = GroupMember::with('members')->where('group_id',$id)->get();
        return view('frontend.pages.group',compact('group','member','groupMembers','posts','status','comments','likes'));

    }

    public function showGroupComments(Request $request){

        $id = $request->post_id;
        $comments = GroupPostComment::with('members')->where('post_id',$id)->orderBy('id','desc')->limit(5)->get();
        return response()->json($comments);
    }

    public function memberStatus($id){
        $status = GroupMember::where([['user_id','=',Auth::user()->id],['group_id','=',$id]])->first();


        if(isset($status)){
            return $status->status;

        }

    }

    public function singleMember($id){
        $member = GroupMember::where([['user_id','=',Auth::user()->id],['group_id','=',$id]])->first();
        return $member;

    }


    public function join(Request $request){
        $joined = GroupMember::where([['user_id','=',Auth::user()->id],['group_id','=',$request->group_id],['status','=',1]])->exists();
        $requested = GroupMember::where([['user_id','=',Auth::user()->id],['group_id','=',$request->group_id],['status','=',0]])->exists();

        if($joined){
        $unjoin = GroupMember::where([['user_id','=',Auth::user()->id],['group_id','=',$request->group_id],['status','=',1]])->delete();
        return response()->json('Join');

        // }else if($requested){
        //     $unjoin = GroupMember::where([['user_id','=',Auth::user()->id],['group_id','=',$request->group_id],['status','=',0]])->delete();
        //     return response()->json('Join');
        }else{
            $joined = GroupMember::create([
                'user_id' => Auth::user()->id,
                'group_id' => $request->group_id,
                'status' => '1'
            ]);
            return response()->json('Joined');

        }

    }



    public function acceptJoinRequest(Request $request){

        $id = $request->request_id;

        $request =  GroupMember::where('id',$id)->first();

        $accepted = $request->update([
            'status' => 1
        ]);
        if($accepted){

            return response()->json('Joined');

        }else{
            return response()->json('Spmething Went Wrong');
        }



    }

    public function createPost(Request $request){

        if ($request->hasfile('image')) {
            $name = !empty($request->title) ? $request->title : config('app.name');

            $name = Str::slug($name, '-')  . "-" . time() . '.' . $request->image->extension();
            $request->image->move(public_path("/user/group/post/images/"), $name);

        }else{
            $name = "";
        }
          $posted = GroupPost::create([
              'group_id' => $request->group_id,
              'user_id' => Auth::user()->id,
              'content' => $request->post,
              'file' => $name

          ]);

          if($posted){
              $data = GroupPost::with('member')->get();
              $post = collect($data)->last();

            return response()->json($post);

          }
          else{
            return response()->json("Something Went Wrong");

          }

    }


    public function groupPostComment(Request $request){


        $added = GroupPostComment::create([
            'user_id'=>$request->user_id,
            'group_id' => $request->group_id,
            'post_id' => $request->post_id,
            'content' => $request->content
        ]);

        if($added){
            $id = $added->id;

            $comments = GroupPostComment::with('members')->where('id',$id)->first();

            return response()->json($comments);



        }


    }

    public function likeGroupPost(Request $request){
        $exists = GroupPostLike::where([['user_id','=',Auth::user()->id],['group_id','=',$request->group_id],['post_id','=',$request->post_id]])->exists();
        if(!$exists){

            $liked =  GroupPostLike::create([
                'user_id' => Auth::user()->id,
                'post_id' => $request->post_id,
                'group_id' => $request->group_id,
                'like_status' => 1
            ]);
            return response()->json('Liked');
        }
        elseif($exists){
            $liked =  GroupPostLike::where([['user_id','=',Auth::user()->id],['group_id','=',$request->group_id],['post_id','=',$request->post_id]])->delete();
            return response()->json('Like');



        }

    }


    public function groupMembers($id){

        $members = GroupMember::with('members')->where('group_id',$id)->get();

        return view('frontend.pages.groupmember',compact('members'));

    }




}
