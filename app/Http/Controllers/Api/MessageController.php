<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\User;

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

    // public function showIcon($receiver_id)
    // {
    //     $picture_path = User::find($receiver_id)->picture_path;
    //     $imgsrc = asset('storage/assets/' . $picture_path);
    //     return response()->json($imgsrc);
    // }

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

    public function seen($messageId) //put // post
    {
        $message = Message::where('id',$messageId)->update([
            'is_seen' => 1 ,
        ]);
        return ($message);
    }
}
