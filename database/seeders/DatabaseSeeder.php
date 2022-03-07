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
            ['id' => 1, 'name' => 'Admin'],
            ['id' => 2, 'name' => 'Teacher'],
            ['id' => 3, 'name' => 'Student' ],
       
        ];

        Role::insert($roles);
        DB::table('users')->delete();
        $users = [
            ['id'=>'1',
                'name' => 'student',
            'username' =>'stud',
            // 'email_verified_at' => now(),
            'password' =>password_hash('pass',PASSWORD_DEFAULT ) ,// password
            // 'email' =>'stud@gmail.com',
            'remember_token' => Str::random(10),
            'roleId'=> '3',
            //address
            'government'=> 'country',
            'city'=> 'city',
            'street'=> 'streetName',
            ] ,
            ['id'=>'2',
            
                'name' => 'Admin',
            'username' =>'admn',
            // 'email_verified_at' => now(),
            'password' =>password_hash('pass',PASSWORD_DEFAULT ) ,// password
            // 'email' =>'admn@gmail.com',
            'remember_token' => Str::random(10),
            'roleId'=> '1',
            //address
            'government'=> 'country',
            'city'=> 'city',
            'street'=> 'streetName',
            ] ,
            ['id'=>'3',
            
                'name' => 'teacher',
            'username' =>'tchr',
            // 'email' =>'tchr@gmail.com',
            // 'email_verified_at' => now(),
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
        DB::table('classrooms')->delete();
        $classrooms = [
          [  'id'=>'1',
         
            'level' => '2',
            'capacity' =>'20',
            'code' => '3',
            
            ] ,
        ];
        
        \App\Models\Classroom::insert($classrooms);

        // DB::table('students')->delete();
        $students = [
            [
            'id' => '1',
            'phone' =>'0121156566',
            'picture_path' => '/tmp/tmp',
            'classroomId'=> '1',
            ] ,
        ];
        
        \App\Models\Student::insert($students);


        // \App\Models\User::factory(10)->create();
        // \App\Models\Student::factory(10)->create();
        // \App\Models\Classroom::factory(10)->create();
        // \App\Models\Subject::factory(10)->create();

        // \App\Models\User::factory(10)->create();
    }
}
