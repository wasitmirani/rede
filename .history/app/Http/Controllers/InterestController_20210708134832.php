<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use Illuminate\Http\Request;

class InterestController extends Controller
{

    public function interests(){


        $interests = Interest::all();

        return view('frontend.pages.interests',compact('interests'));
    }



}
