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

        return view('frontend.pages.interests',compact('interests'));
    }

    public function addInterests(Request $request){

           $added = MyInterest::create([
               'user_id' => Auth::user()->id,
               'interest' => $request->id
           ]);

           if(){
               return response()->json('Added');
           }else{
               return response()->json('Failed To Add Interest');
           }


    }



}
