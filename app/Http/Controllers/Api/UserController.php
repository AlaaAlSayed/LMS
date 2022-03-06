<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function user()
    {
        // Get the currently authenticated user...
        $user = Auth::user();
        return $user;
    }

    public function id()
    {
        // Get the currently authenticated user's ID...
        $id = Auth::id();
        return $id;
    }

   
    public function  generateToken(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            // 'device_name' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'username' => ['The provided credentials are incorrect.'],
            ]);
        }
        $token = $user->createToken($request->password)->plainTextToken;
        return response()->json($token);
    }
}
