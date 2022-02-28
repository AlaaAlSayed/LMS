<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // 'message',
    // 'user_id',
    // 'receiver_id',
    // 'is_seen'

    public function index()
    {
        $allMessages = Message::all();
        return  $allMessages->all();
    }

    public function show($messageId)
    {
        $message = Message::find($messageId);
        return ($message);
    }

    public function showIcon($receiver_id)
    {
        $message = Message::find($receiver_id);
        return ($message);
    }

    public function store() //StoreSubjectRequest $request)
    {
        $data = request()->all();

        $message = Message::create([
            // 'message',
            // 'user_id',
            // 'receiver_id',
            // 'is_seen'
            'message' => $data['message'],
            'user_id' => $data['user_id'],
            'receiver_id' => $data['receiver_id'],
            'is_seen' => $data['is_seen'],
        ]);

        return ($message);
    }
}
