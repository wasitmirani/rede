<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessengerController extends Controller
{
    //
    public function getMessages(){

        return view('frontend.pages.messenger.index');
    }
}
