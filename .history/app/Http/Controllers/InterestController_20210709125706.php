<?php

namespace App\Http\Controllers;

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
        $interests = Interest::all();
        $myInterests = User::with('interests')->where('id',$id)->get();



        return view('frontend.pages.interests',compact('interests','myInterests'));
    }

    public function addInterests(Request $request){

        $id = Auth::user()->id;
        $interest = json_encode($request->interest);
        $added = MyInterest::create([
            'user_id' => $id,
            'interest' =>$interest
        ]);





           if($added){
               return back()->with('message','Your Interest List Updated');
           }else{
               return response()->json('Failed To Add Interest');
           }


    }

    public function myInterests($id){


        $myInterests = User::with('interests')->where('id',$id)->get();


        return view('frontend.pages.myinterest',compact('myInterests'));

    }



}
