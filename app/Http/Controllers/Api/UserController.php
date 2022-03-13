<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Admin;

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

    public function notifications()
    {
        $user = auth()->user();
        if ($user->roleId == 3) {
            $allNotifications = Student::find($user->id)->notifications;
        }
        elseif ($user->roleId == 2) {
            // return $user->id;
            $allNotifications = Teacher::find($user->id)->notifications;
        }
        elseif ($user->roleId == 3) {
            $allNotifications = Admin::find($user->id)->notifications;
        }
        return $allNotifications;
    }
    public function studentNotifications()
    {
        $user = auth()->user();
        if ($user->roleId == 3) {
            $allNotifications = Student::find($user->id)->notifications;
            return $allNotifications;
        }
    }
    public function teacherNotifications()
    {
        $user = auth()->user();

        if ($user->roleId == 2) {
            $allNotifications = Teacher::find($user->id)->notifications;
            return $allNotifications;
        }
    }
}
