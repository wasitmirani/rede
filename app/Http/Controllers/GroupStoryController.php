<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Interest;
use App\Models\GroupPost;
use App\Models\GroupStory;
use App\Models\GroupMember;
use Illuminate\Http\Request;
use App\Models\GroupPostLike;
use App\Models\GroupPostComment;
use Illuminate\Support\Facades\Auth;

class GroupStoryController extends Controller
{
    public function index($id){

        $interests = Interest::all();
        $group = Group::find($id);
        return view('frontend.pages.group.story',compact('interests','group'));
    }

    public function store(Request $request){

        $group = new GroupStory;
        $group->story = $request->description;
        $group->group_id = $request->id;
        if($group->save()){
            $group = Group::with('members')->where('id',$request->id)->first();
            $posts = GroupPost::with('member')->orderBy('id','desc')->where('group_id',$request->id)->get();
            $comments = GroupPostComment::with('members')->where('group_id',$request->id)->orderBy('id','desc')->limit(3)->get();
            $likes = GroupPostLike::where('id',$request->id)->get();
            $status = $this->memberStatus($request->id);
            $member = $this->singleMember($request->id);
            $groupMembers = GroupMember::with('members')->where('group_id',$request->id)->get();
            return view('frontend.pages.group',compact('group','member','groupMembers','posts','status','comments','likes'));
        }
        return redirect()->back();

    }

    public function particulars($id) {
        
        return view('frontend.pages.group.particulars');


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




}
