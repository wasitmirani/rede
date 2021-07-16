<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use App\Models\MyInterest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterestController extends Controller
{

    public function interests(){


        $interests = Interest::all();
        $myInterests = MyInterest::all();

        return view('frontend.pages.interests',compact('interests','myInterests'));
    }

    public function addInterests(Request $request){

           $added = MyInterest::create([
               'user_id' => Auth::user()->id,
               'interest_id' => $request->id
           ]);

           if($added){
               return response()->json('Added');
           }else{
               return response()->json('Failed To Add Interest');
           }


    }



}
