<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
         'username' => ['required', 'string', 'max:255', 'unique:users'],
         'email' => ['required', 'string','email', 'max:255', 'unique:users'],
        ]);

       $user= User::create([
            'name'=>$request->full_name,
            'email' => $request->email,
            'username'=>$request->username,
            'phone_number'=>$request->phone_number,
            'password' => Hash::make($request->password),
        ]);

        $social=[
            'facebook'=>$request->fb,
            'twitter'=>$request->twitter,
            'google_plus'=>$request->google_plus,
        ];

        UserDetail::create([
            'user_id'=>$user->id,
            'social'=>json_encode($social),
            'zip_code'=>$request->zip_code,

        ]);


        return response()->json(['message'=>'success'],200);

    }

    public function soon(){

        return view('frontend.pages.soon');
    }
}
