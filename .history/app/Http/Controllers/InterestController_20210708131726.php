<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterestController extends Controller
{

    public function interests(){

        return view('frontend.pages.interests');
    }

}
