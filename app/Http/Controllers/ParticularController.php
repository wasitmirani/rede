<?php

namespace App\Http\Controllers;

use Str;
use Auth;
use App\Models\User;
use App\Models\Particular;
use Illuminate\Http\Request;
use App\Models\ParticularDetail;

class ParticularController extends Controller
{
    public function index(){

        $particulars = Particular::where('user_id',Auth::user()->id)->with('details')->get();
        $user = User::with('profile')->find(Auth::user()->id);

        return view('frontend.pages.particulars.particulars',compact('particulars','user'));
    }


    public function create(){
        return view('frontend.pages.particulars.add');
    }

    public function store(Request $request){

        $request->validate([
            'particular' => ['required'],

        ]);
        $particular = Particular::create(['particular'=>$request->particular,'user_id'=> Auth::user()->id]);
        $titles = $request->title;
        $values = $request->value;
        $name = "";
        $images = $request->image;
        foreach($images as $key => $image){

                    $name = !empty($request->titl[$key]) ? $request->titl[$key] : config('app.name');
                    $name = Str::slug($name, '-')  . "-" . time() . '.' . $image->extension();
                    $image->move(public_path("/user/particular/images/"), $name);
                   $added =  ParticularDetail::create([
                        'particular_title' => $titles[$key],
                        'particular_value' => $values[$key],
                        'particular_id' => $particular->id,
                        'image' => $name
                    ]);

        }
        if($added){
            $particulars = Particular::where('user_id',Auth::user()->id)->with('details')->get();
            return view('frontend.pages.particulars.particulars',compact('particulars'));

        }else{
            return redirect()->back();
        }



    }




}
