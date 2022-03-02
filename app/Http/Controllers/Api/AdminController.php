<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;


class AdminController extends Controller
{


  

    public function index()
    {
        $allAdmins =  User::join('admins', 'admins.id', '=', 'users.id')->get()->all();
        return  $allAdmins;
    }


    public function show($adminId)
    {
        $admin =  User::join('admins', 'admins.id', '=', 'users.id')->find($adminId);
        session()->flash('message', 'Post successfully updated.');
        return response()->json($admin);
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
