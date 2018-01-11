<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\User;
use Auth;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function show($id) {
        $conversation = Conversation::find($id);
        return view('conversations/conversation', ['conversation' => $conversation]);
    }

    public function postMessage($id, $message) {
        $conversation = Conversation::find($id);
        $messageObject = Auth::user()->messages()->create(['message' => $message]);
        $conversation->messages()->save($messageObject);
        return view('conversations/conversation', ['conversation' => $conversation]);
    }

    public function createConversation(Request $request) {
      $names = $request -> input('names');
      $conversation = new Conversation();
      Auth::user()->conversations()->save($conversation);
      foreach($names as $name) {
        User::where('name', $name)->first()->conversations()->save($conversation);
      }
      return view('conversations/conversation', ['conversation' => $conversation]);
    }
}
