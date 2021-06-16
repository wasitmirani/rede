<?php

namespace App\Http\Controllers;

use App\Models\Messenger;
use App\Models\Conversation;
use Illuminate\Http\Request;


class MessengerController extends Controller
{
    //
    public function index(){

        return view('frontend.pages.messenger.messages');
    }

    public function getConversations(Request $request){
        $conversation=new Conversation();
        $conversations=$conversation->getLatestMessage();

        return response()->json($conversations,200);
    }
    public function getMessages(Request $request){
        $messenger=new Messenger();
        $messages=$messenger->messages($request->conversation_id);
        return response()->json($messages,200);
    }
}
