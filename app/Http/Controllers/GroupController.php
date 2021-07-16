<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupPost;
use App\Models\GroupMember;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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
        $status = $this->memberStatus($id);
        $member = $this->singleMember($id);
        $groupMembers = GroupMember::with('members')->where('group_id',$group->id)->get();
        return view('frontend.pages.group',compact('group','member','groupMembers','posts','status'));

    }

    public function memberStatus($id){
        $status = GroupMember::where([['user_id','=',Auth::user()->id],['group_id','=',$id]])->first();
       return $status;
    }

    public function singleMember($id){
        $member = GroupMember::where([['user_id','=',Auth::user()->id],['group_id','=',$id]])->first();
        return $member;

    }


    public function join(Request $request){

        if(!GroupMember::where([['user_id','=',Auth::user()->id],['group_id','=',$request->group_id]])->exists()){

        $joined = GroupMember::create([
            'user_id' => Auth::user()->id,
            'group_id' => $request->group_id,
        ]);



        return response()->json('Joined');

        }else{

            $unjoin = GroupMember::where([['user_id','=',Auth::user()->id],['group_id','=',$request->group_id]])->delete();
            return response()->json('Join');

        }




    }



    public function acceptJoinRequest(Request $request){

        $id = $request->request_id;

        $request =  GroupMember::where('id',$id)->first();

        $accepted = $request->update([
            'status' => 1
        ]);
        if($accepted){

            return response()->json('Accepted');

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
}
