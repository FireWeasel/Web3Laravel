<?php

namespace App\Http\Controllers;

use App\Conversation;
use Auth;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function show($id)
    {
        $conversation = Conversation::find($id);
        return view('conversations/conversation', ['conversation' => $conversation]);
    }

    public function postMessage($id, $message)
    {
        $conversation = Conversation::find($id);
        $messageObject = Auth::user()->messages()->create(['message' => $message]);
        $conversation->messages()->save($messageObject);
        return view('conversations/conversation', ['conversation' => $conversation]);
    }
}
