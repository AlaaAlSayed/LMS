<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
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




    public function index()
    {
        $allAdmins =  User::join('admins', 'admins.id', '=', 'users.id')->get()->all();
        return  $allAdmins;
    }


    public function show($adminId)
    {
        $admin =  User::join('admins', 'admins.id', '=', 'users.id')->find($adminId)->first();
        return $admin;
    }


    // public function store()
    // {
    //     $data = request()->all();

    //     $newUser=User::create([
    //         'username' => $data['username'],
    //         'name' => $data['name'],
    //         'password' => password_hash($data['password'], PASSWORD_DEFAULT),
    //         'roleId' => '1',
    //         'government' => $data['government'],
    //         'city' => $data['city'],
    //         'street' => $data['street'],
    //     ]);

    //     Admin::create([

    //         'id' => $newUser->id,
    //         'phone' => $data['phone'],
    //         'email' => $data['email'],

    //     ]);

    //     $allAdmins =  User::join('admins', 'admins.id', '=', 'users.id')->get()->all();
    //     return  $allAdmins;
    // }

    public function update($adminId)
    {

        $data = request()->all();

        User::where('id', $adminId)->update([
            'username' => $data['username'],
            'name' => $data['name'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            // 'roleId' => '1',
            'government' => $data['government'],
            'city' => $data['city'],
            'street' => $data['street'],
        ]);

        Admin::where('id', $adminId)->update([
            'phone' => $data['phone'],
            'email' => $data['email'],


        ]);
        $admin =  User::join('admins', 'admins.id', '=', 'users.id')->find($adminId);
        return $admin;
    }
}
