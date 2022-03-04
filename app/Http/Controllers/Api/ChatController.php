<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\sendMessage;


use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;

// use App\Events\MessageSent;
class ChatController extends Controller
{
    public function message(Request $request)
    {
        event(new sendMessage($request->input('user_id'), $request->input('message')));
        return  'hello Rahma from backend';

        // return  $request->input('message');
    }
}


// class ChatsController extends Controller
// {
//     public function __construct()
//     {
//         $this->middleware('auth');
//     }

//     /**
//      * Show chats
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index()
//     {
//         return view('chat');
//     }

//     /**
//      * Fetch all messages
//      *
//      * @return Message
//      */
//     public function fetchMessages()
//     {
//         return sendMessage::with('user')->get();
//     }

//     /**
//      * Persist message to database
//      *
//      * @param  Request $request
//      * @return Response
//      */
//     public function sendMessage(Request $request)
//     {
//         $user = Auth::user();

//         $message = $user->messages()->create([
//             'message' => $request->input('message')
//         ]);

//         broadcast(new MessageSent($user, $message))->toOthers();

//         return ['status' => 'Message Sent!'];
//     }
// }