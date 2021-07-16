<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedsController extends Controller
{
    //
    public function newFeeds(){
        return view('frontend.pages.messenger.index');
    }
    public function feeds(){
        return view('frontend.pages.feeds');
    }


    public function storeFeed(Request $request){

         $feed = new Feed;
         $feed->feed = $request->post;
         $feed->user_id =  Auth::user()->id;
         $posted = $feed->save();
         $post = Feed::orderBy('id', 'desc')->first();

         if($posted){

            return response()->json($post);

         }else{
             return response()->json('Failed To Post');

         }

    }
}
