<?php

namespace App\Http\Controllers;
use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function myBookmarks(){

        $bookmarks = Bookmark::all();
        return view('frontend.pages.mybookmark',compact('bookmarks'));

    }

    public function addBookmarks(Request $request){

          $request->validate([
              'title' => 'required',
              'url'   => 'required'
          ]);
          $bookmark = BookMark::create([
              'title'=>$request->title,
              'url' => $request->url,
              'user_id' => Auth::user()->id
            ]);

            if($bookmark){

                return response()->json('200');

            }else{
                return response()->json('Something Went Wrong');
            }
    }
}
