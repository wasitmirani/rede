<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //

    public function index(){
        return view('frontend.pages.index');
    }

    public function welcome(){
        return view('frontend.pages.welcome');
    }
    public function signup(){
        return view('frontend.pages.signup');
    }

    public function register(Request $request){

        $request->validate([
         'username' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

    }
}
