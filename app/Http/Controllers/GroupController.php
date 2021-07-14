<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;
class GroupController extends Controller
{
    public function index(){
        $groups = Group::where('user_id',Auth::user()->id)->get();
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
           $group->image = $name;
           if($group->save()){

               return response()->json('Group Create');
           }else{
               return response()->json('Something Went Wrong');
           }



    }

    public function details(Request $request){
        dd($request->id);

    }
}
