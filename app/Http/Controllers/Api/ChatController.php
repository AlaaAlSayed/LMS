<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\clientSendMessage;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
class ChatController extends Controller
{
  
    public function index()
    {
        $allUsers = $this->chatUsers();
        return view('chat',['allUsers'=>$allUsers]);
    }

    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    public function sendMessage(Request $request)
    {
        $user = Auth::user();
        $message = $user->messages()->create([
            'message' => $request->input('message'),
            'receiver_id' => $request->input('receiver_id'),
            'user_id' => $request->input('user_id'),
            'is_seen' => 0,

        ]);
        broadcast(new clientSendMessage($request->input('user_id'), $request->input('receiver_id'),$request->input('message')))->toOthers();
        return ['status' => 'Message Sent!'];
    }
    
    public function chatUsers()
    {
        $user = Auth::user();
        // dd($user);
        if ($user->roleId == 3) //student
        {
            $allUsers = User::where('roleId', '=', '1')->orWhere('roleId', '=', '2')->get();
        } elseif ($user->roleId == 2) //teacher
        {
            $allUsers = User::where('roleId', '=', '1')->orWhere('roleId', '=', '3')->get();
        } else //admin
        {
            $allUsers = User::all();
        }
        return $allUsers;
    }
}
// class ChatController extends Controller
// {
//     public function send(Request $request)
//     {
//         event(new sendMessage($request->input('user_id'), $request->input('message')));
//         return  'hello Rahma from backend';

//         // return  $request->input('message');
//     }

//     public function fetch($userId)
//     {
//         return  'hello Rahma from backend';
//     }

//     public function chatUsers()
//     {
//         $user = Auth::user();
//         // dd($user);
//         if ($user->roleId == 3) //student
//         {
//             $allUsers = User::where('roleId', '=', '1')->orWhere('roleId', '=', '2')->get();
//         } elseif ($user->roleId == 2) //teacher
//         {
//             $allUsers = User::where('roleId', '=', '1')->orWhere('roleId', '=', '3')->get();
//         } else //admin
//         {
//             $allUsers = User::all();
//         }
//         return $allUsers;
//     }

//     // public function __construct()
//     // {
//         // $this->middleware('auth');
//     // }

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

//         $message = $user->messages->create([
//             'message' => $request->input('message')
//         ]);

//         broadcast(new MessageSent($user, $message))->toOthers();

//         return ['status' => 'Message Sent!'];
//     }
// }
