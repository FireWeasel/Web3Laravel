<?php

namespace App\Http\Controllers;

use App\Conversation;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function show($id)
    {
        $conversation = Conversation::find($id);
        return view('conversations/conversation', ['conversation' => $conversation]);
    }
}
