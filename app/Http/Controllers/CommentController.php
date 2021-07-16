<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function comments(){
        $comments = Comment::all();
    }

    public function postComment(Request $request){

        $added = Comment::create([
            'comment' => $request->comment,
            'user_id' => $request->id,
            'post_id' => $request->postId
        ]);
        if($added){

            return response()->json($request->comment);

        }else{

            return response()->json('failed to add comment');

        }

    }
}
