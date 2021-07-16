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


        $interests = Interest::all();
        $myInterests = MyInterest::all();

        return view('frontend.pages.interests',compact('interests','myInterests'));
    }

    public function addInterests(Request $request){



        $added = DB::table('interest_user')->insert([
            'user_id' => Auth::user()->id,
             'interest_id' => $request->interest_id

        ]);

           if($added){
               return response()->json('Added');
           }else{
               return response()->json('Failed To Add Interest');
           }


    }

    public function myInterests($id){


        $myInterest = User::with('interests')->where('id',$id);
        dd($myInterest);
        return view('frontend.pages.myinterest');

    }



}
