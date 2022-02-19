<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAvatarController extends Controller
{
    public function update(Request $request)
    {
        $path = $request->file('avatar')->store('avatars');
 
        return $path;
    }
}
