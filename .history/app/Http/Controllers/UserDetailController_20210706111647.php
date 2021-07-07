<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    public function profileSetting(){

        $user = User::find(1);

        return view('frontend.pages.profile',compact('user'));

    }
}
