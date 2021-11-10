<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;

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

    public function signupUser(Request $request){

    $request->validate([
        'username' => ['required', 'string', 'max:255', 'unique:users'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'terms' => ['required'],
        'password' => ['required',
        'min:8',
        'regex:/[a-z]/',      // must contain at least one lowercase letter
        'regex:/[A-Z]/',      // must contain at least one uppercase letter
        'regex:/[0-9]/',      // must contain at least one digit
        'regex:/[@$!%*#?&]/',
        'confirmed'],
        'zipcode' => [
            'regex:/[0-9]/',
            'min:5'
        ],
        ]);

       $user= User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'pass_key' => "i'mrede",
            'image' => 'dummyuser.jpg'

        ]);

        $social=[
            'facebook'=>$request->fb,
            'twitter'=>$request->twitter,
            'google_plus'=>$request->google_plus,
        ];

        UserDetail::create([
            'user_id'=>$user->id,
            'social'=>json_encode($social),
            'zip_code'=>$request->zipcode,
            'covid_status' => $request->status,
            'pronouns' => $request->pronouns,
            'age' => $request->age,
            'gender' => $request->gender

       ]);

       if($user){
        $credentials = $request->only('username', 'password');
        if(Auth::attempt($credentials)) {


               $message = "Now You Are Member Of Rede Community. Start Exploring!";// Flip the flag to true
           // By that you tell it to save the new flag value into the users table

            Cache::put('customer_login',1);

            return redirect()->route('my.profile')->with('loginMessage',$message);

        }else{

        }

       }

        // return response()->json(['message'=>'success'],200);


    }

    public function soon(){

        return view('frontend.pages.soon');
    }

    public function congs(){

    return view('frontend.pages.congs');
    }

    public function timeLine(){

         return view('frontend.pages.timeLine');
    }

    public function customerLogin(){
        return  view('frontend.pages.customerLogin');
    }

    public function LoginUser(Request $request){

        $password=$request->password;

        $credentials = $request->only('username', 'password');
        if(Auth::attempt($credentials)) {

            Cache::put('customer_login',1);

            // return redirect()->route('new.feeds');
            return response()->json('1');

        } else {
            Cache::forget('customer_login');
            // return back()->with('message','Please check your email or password not matched try agin');
            return response()->json('0');
        }
    }


    public function mcguffin(){

        return view('frontend.pages.mcguffin.mcguffin');
    }
}
