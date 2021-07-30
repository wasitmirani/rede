<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Interest;
use App\Models\MyInterest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InterestController extends Controller
{

    public function interests(){

        $id = Auth::user()->id;
        $tags = Tag::all();
        $interests = Interest::orderby('id','desc')->paginate(9);
        $myInterests = User::with('interests')->where('id',$id)->orderby('id','desc','tags')->get();



        return view('frontend.pages.interests',compact('interests','myInterests','tags'));
    }

    public static function my_interest($interest){
        $id = Auth::user()->id;
        $exists = MyInterest::where([['user_id','=',$id],['interest','=',$interest]])->exists();
        if($exists){
            return 'Added';

        }
        else if(!$exists){
            return 'Add';

        }
    }

    public function addInterests(Request $request){

        $id = Auth::user()->id;


        // $interest = json_encode($request->interests);

        // $interests = MyInterest::where('user_Id',$id)->count();
        $exists = MyInterest::where([['user_id','=',$id],['interest','=',$request->interest]])->exists();
        $added = "";
        if($exists){
            $existing = MyInterest::where([['user_id','=',$id],['interest','=',$request->interest]])->delete();
            return response()->json('Add');


        }else if(!$exists){
            $added = MyInterest::create([
                'user_id' => $id,
                'interest' => $request->interest
            ]);
            if($added){
                return response()->json('Added');
            }

        }



        // foreach($request->interests as $int){
        //     $added = DB::table('interest_user')->insert([
        //         'user_id' => Auth::user()->id,
        //         'interest_id' => $int,
        //     ]);



        // }

        // switch ($interests) {
        //     case '0':
        //         $added = MyInterest::create([
        //                     'user_id' => $id,
        //                     'interest' =>$interest
        //                 ]);
        //         break;

        //     default:
        //     $int = MyInterest::where('user_Id',$id)->first();
        //         $int->user_id = $id;
        //         $int->interest = $interest;
        //         $added = $int->save();
        //         break;
        // }




    }

    public function myInterests($id){

        // $myInterests = User::with('interests')->where('id',$id)->get();

        $myInterests = MyInterest::where('user_id',$id)->orderby('id','desc')->paginate(6);

        return view('frontend.pages.myinterest',compact('myInterests'));

    }


    public function getinterest(){


        $id = Auth::user()->id;
        $interests = Interest::orderby('id','desc')->paginate(15);
        $myInterests = User::with('interests')->where('id',$id)->orderby('id','desc')->get();
        $data['interests'] = $interests;
        $data['myInterests'] = $myInterests;
        return response()->json($data);
    }



    public function searchByTag(Request $request){
           return response()->json($request->all());

    }






}
