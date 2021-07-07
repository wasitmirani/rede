<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    public function profileSetting(){

        return view('frontend.pages.profile');

    }
}
