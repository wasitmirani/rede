<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedsController extends Controller
{
    //
    public function newFeeds(){
        return view('frontend.pages.messenger.index');
    }
}
