<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        $roles = [
            ['id' => 1, 'name' => 'ROLE_ADMIN'],
            ['id' => 2, 'name' => 'ROLE_TEACHER'],
            ['id' => 3, 'name' => 'ROLE_STUDENT' ],
       
        ];

        Role::insert($roles);
        DB::table('users')->delete();
        $users = [
            ['name' => 'student',
            'username' =>'stud',
            'email_verified_at' => now(),
            'password' =>password_hash('pass',PASSWORD_DEFAULT ) ,// password
            'remember_token' => Str::random(10),
            'roleId'=> '3',
            //address
            'government'=> 'country',
            'city'=> 'city',
            'street'=> 'streetName',
            ] ,
            ['name' => 'Admin',
            'username' =>'admn',
            'email_verified_at' => now(),
            'password' =>password_hash('pass',PASSWORD_DEFAULT ) ,// password
            'remember_token' => Str::random(10),
            'roleId'=> '1',
            //address
            'government'=> 'country',
            'city'=> 'city',
            'street'=> 'streetName',
            ] ,
            ['name' => 'teacher',
            'username' =>'tchr',
            'email_verified_at' => now(),
            'password' =>password_hash('pass',PASSWORD_DEFAULT ) ,// password
            'remember_token' => Str::random(10),
            'roleId'=> '2',
            //address
            'government'=> 'country',
            'city'=> 'city',
            'street'=> 'streetName',
            ] ,

       
        ];
        
        \App\Models\User::insert($users);


        // \App\Models\User::factory(10)->create();
        // \App\Models\Student::factory(10)->create();
        // \App\Models\Classroom::factory(10)->create();
        // \App\Models\Subject::factory(10)->create();

        // \App\Models\User::factory(10)->create();
    }
}
