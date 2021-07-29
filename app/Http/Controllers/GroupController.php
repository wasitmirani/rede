<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupPost;
use App\Models\GroupMember;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\GroupPostLike;
use App\Models\GroupPostComment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function index(){

        $groups = Group::orderBy('created_at','desc')->get();

        return view('frontend.pages.groups',compact('groups'));
    }

    public function createGroup(){
        return view('frontend.pages.creategroup');
    }

    public function storeGroup(Request $request){
        $validate = $request->validate([

            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
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
           $group->description = $request->description;
           $group->user_id = Auth::user()->id;
           $group->interest = $request->interest;
           $group->image = $name;

           if($group->save()){
               return response()->json('Group Created');

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
        $groupMembers = GroupMember::with('members')->where('group_id',$group->id)->get();
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

        }else if($requested){
            $unjoin = GroupMember::where([['user_id','=',Auth::user()->id],['group_id','=',$request->group_id],['status','=',0]])->delete();
            return response()->json('Join');
        }else{



            $joined = GroupMember::create([
                'user_id' => Auth::user()->id,
                'group_id' => $request->group_id,
            ]);
            return response()->json('Requested');

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

    public function joinRequest(){

    }
}
