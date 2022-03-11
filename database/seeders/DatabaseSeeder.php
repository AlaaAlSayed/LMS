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
      ['id' => 3, 'name' => 'Student'],

    ];

    Role::insert($roles);
    ///////////////////////////////////////////////////
    DB::table('users')->delete();
    $users = [
      [
        'id' => '1',
        'name' => 'fatma',
        'username' => 'student fatma',
        // 'email_verified_at' => now(),
        'password' => password_hash('pass', PASSWORD_DEFAULT), // password
        // 'email' =>'stud@gmail.com',
        'remember_token' => Str::random(10),
        'roleId' => '3',
        //address
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '2',
        'name' => 'mohammed ',
        'username' => 'student mohammed',
        // 'email_verified_at' => now(),
        'password' => password_hash('pass', PASSWORD_DEFAULT), // password
        // 'email' =>'stud@gmail.com',
        'remember_token' => Str::random(10),
        'roleId' => '3',
        //address
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '3',
        'name' => 'mostafa',
        'username' => 'student mostafa',
        // 'email_verified_at' => now(),
        'password' => password_hash('pass', PASSWORD_DEFAULT), // password
        // 'email' =>'stud@gmail.com',
        'remember_token' => Str::random(10),
        'roleId' => '3',
        //address
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '4',
        'name' => 'khaled',
        'username' => 'student khaled',
        // 'email_verified_at' => now(),
        'password' => password_hash('pass', PASSWORD_DEFAULT), // password
        // 'email' =>'stud@gmail.com',
        'remember_token' => Str::random(10),
        'roleId' => '3',
        //address
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '5',
        'name' => 'yassin',
        'username' => 'student yassin',
        // 'email_verified_at' => now(),
        'password' => password_hash('pass', PASSWORD_DEFAULT), // password
        // 'email' =>'stud@gmail.com',
        'remember_token' => Str::random(10),
        'roleId' => '3',
        //address
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '6',

        'name' => 'ali',
        'username' => 'student ali',
        // 'email' =>'tchr@gmail.com',
        // 'email_verified_at' => now(),
        'password' => password_hash('pass', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '2',
        //address
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '7',
        'name' => 'gamal',
        'username' => 'teacher gamal',
        // 'email_verified_at' => now(),
        'password' => password_hash('pass', PASSWORD_DEFAULT), // password
        // 'email' =>'stud@gmail.com',
        'remember_token' => Str::random(10),
        'roleId' => '2',
        //address
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '8',
        'name' => 'alaa',
        'username' => 'teacher alaa',
        // 'email_verified_at' => now(),
        'password' => password_hash('pass', PASSWORD_DEFAULT), // password
        // 'email' =>'stud@gmail.com',
        'remember_token' => Str::random(10),
        'roleId' => '2',
        //address
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '9',
        'name' => 'mostafa',
        'username' => 'teacher mostafa',
        // 'email_verified_at' => now(),
        'password' => password_hash('pass', PASSWORD_DEFAULT), // password
        // 'email' =>'stud@gmail.com',
        'remember_token' => Str::random(10),
        'roleId' => '2',
        //address
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '10',
        'name' => 'hadeer',
        'username' => 'teacher hadeer',
        // 'email_verified_at' => now(),
        'password' => password_hash('pass', PASSWORD_DEFAULT), // password
        // 'email' =>'stud@gmail.com',
        'remember_token' => Str::random(10),
        'roleId' => '2',
        //address
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],

      [
        'id' => '11',

        'name' => 'ahmed',
        'username' => 'student ahmed',
        // 'email' =>'tchr@gmail.com',
        // 'email_verified_at' => now(),
        'password' => password_hash('pass', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '2',
        //address
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],

      [
        'id' => '12',

        'name' => 'khairy',
        'username' => 'admin khairy',
        // 'email' =>'tchr@gmail.com',
        // 'email_verified_at' => now(),
        'password' => password_hash('pass', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '1',
        //address
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],

    ];

    \App\Models\User::insert($users);
    //////////////////////////////////////////////////////
    DB::table('classrooms')->delete();
    $classrooms = [
      [
        'id' => '1',

        'level' => '1',
        'capacity' => '20',
        'code' => '1/1',

      ],
      [
        'id' => '2',

        'level' => '1',
        'capacity' => '20',
        'code' => '1/2',

      ],
      [
        'id' => '3',

        'level' => '2',
        'capacity' => '20',
        'code' => '2/1',

      ],
      [
        'id' => '4',

        'level' => '2',
        'capacity' => '20',
        'code' => '2/2',

      ],
      [
        'id' => '5',

        'level' => '3',
        'capacity' => '20',
        'code' => '3/1',

      ],  [
        'id' => '6',

        'level' => '3',
        'capacity' => '20',
        'code' => '3/2',

      ],
      [
        'id' => '7',

        'level' => '4',
        'capacity' => '20',
        'code' => '4/1',

      ],
      [
        'id' => '8',

        'level' => '4',
        'capacity' => '20',
        'code' => '4/2',

      ],
    ];

    \App\Models\Classroom::insert($classrooms);


    DB::table('students')->delete();
    $students = [
      [
        'id' => '1',
        'phone' => '0121156566',
        'picture_path' => '/tmp/tmp',
        'classroomId' => '1',
      ],
    ];

    \App\Models\Student::insert($students);

    //////////////////////////////////////////////////////////////
    // \App\Models\User::factory(10)->create();
    // \App\Models\Student::factory(10)->create();
    // \App\Models\Classroom::factory(10)->create();
    // \App\Models\Subject::factory(10)->create();

    // \App\Models\User::factory(10)->create();


    DB::table('exams')->delete();
    $exam = [
      ['name' => 'history exam', 'id' => '1'],
      ['name' => 'science exam', 'id' => '2'],
      ['name' => 'math exam', 'id' => '3'],
      ['name' => 'english exam', 'id' => '4'],
      ['name' => 'arabic exam', 'id' => '5'],
      ['name' => 'religion exam', 'id' => '6'],

    ];

    \App\Models\Exam::insert($exam);

    ////////////////////////////////////////////////////////////
    DB::table('subjects')->delete();
    $subject = [

      [
        'id' => '1',
        'name' => 'arabic',
        'classroomId' => '1',
      ],
      [
        'id' => '2',
        'name' => 'math',
        'classroomId' => '1',
      ],
      [
        'id' => '3',
        'name' => 'english',
        'classroomId' => '1',
      ],

      [
        'id' => '4',
        'name' => 'arabic',
        'classroomId' => '2',
      ],
      [
        'id' => '5',
        'name' => 'math',
        'classroomId' => '2',
      ],
      [
        'id' => '6',
        'name' => 'english',
        'classroomId' => '2',
      ],
      [
        'id' => '7',
        'name' => 'arabic',
        'classroomId' => '3',
      ],
      [
        'id' => '8',
        'name' => 'english',
        'classroomId' => '3',
      ],
      [
        'id' => '9',
        'name' => 'math',
        'classroomId' => '3',
      ],

      ///////////////////////////////
      [
        'id' => '10',
        'name' => 'arabic',
        'classroomId' => '4',
      ],
      [
        'id' => '11',
        'name' => 'math',
        'classroomId' => '4',
      ],
      [
        'id' => '12',
        'name' => 'english',
        'classroomId' => '4',
      ],

      [
        'id' => '13',
        'name' => 'science',
        'classroomId' => '4',
      ],
      [
        'id' => '14',
        'name' => 'history',
        'classroomId' => '4',
      ],
      [
        'id' => '15',
        'name' => 'religion',
        'classroomId' => '4',
      ],

      [
        'id' => '16',
        'name' => 'arabic',
        'classroomId' => '8',
      ],
      [
        'id' => '17',
        'name' => 'math',
        'classroomId' => '5',
      ],
      [
        'id' => '18',
        'name' => 'english',
        'classroomId' => '5',
      ],

      [
        'id' => '19',
        'name' => 'science',
        'classroomId' => '5',
      ],
      [
        'id' => '20',
        'name' => 'history',
        'classroomId' => '5',
      ],
      [
        'id' => '21',
        'name' => 'religion',
        'classroomId' => '5',
      ],





    ];

    \App\Models\Subject::insert($subject);
    ///////////////////////////////////////////////////////////////////////
    DB::table('teachers')->delete();
    $teachers = [

      [
        'id' => '6',


        'email' => 'ali@gmail.com',

        'phone' => '01278194322',
        'picture_path' => 'image',
      ],
      [
        'id' => '7',

        'email' => 'gamal@gmail.com',

        'phone' => '01278194322',
        'picture_path' => 'image',
      ],
      [
        'id' => '8',

        'email' => 'alaa@gmail.com',

        'phone' => '01278194322',
        'picture_path' => 'image',
      ],
      [
        'id' => '9',

        'email' => 'mostafa@gmail.com',

        'phone' => '01278194322',
        'picture_path' => 'image',
      ],
      [
        'id' => '10',

        'email' => 'hadeer@gmail.com',

        'phone' => '01278194322',
        'picture_path' => 'image',
      ],

      [
        'id' => '11',


        'email' => 'Ahmed@gmail.com',

        'phone' => '01278194322',
        'picture_path' => 'image',
      ],


    ];

    \App\Models\Teacher::insert($teachers);
    //////////////////////////////////////////////////

    DB::table('quistions')->delete();
    $question = [

      [
        'id' => '1',
        'value' => 'كم تبلغ طول رقبه الزرافه؟',
        'subjectId' => '5',
        'examId' => '1',
      ],
      [
        'id' => '2',
        'value' => 'ما هو معنى كلمة فرعون؟',
        'subjectId' => '5',
        'examId' => '1',
      ],
      [
        'id' => '3',
        'value' => ' من اسم أفصح العرب؟',
        'subjectId' => '5',
        'examId' => '1',
      ],


      [
        'id' => '4',
        'value' => 'ما هي أقصر كلمة موجودة باللغة العربية؟',
        'subjectId' => '5',
        'examId' => '1',
      ],
      /////////////////////////////////////////////////////////////////////////

    ];
    \App\Models\Quistion::insert($question);
    /////////////////////////////////////////

    DB::table('options')->delete();
    $option = [

      [
        'id' => '1',
        'value' => '1.8 m',
        'quistionId' => '1',
        'is_correct' => '1',
      ],
      [
        'id' => '2',
        'value' => '2 m ',
        'quistionId' => '1',
        'is_correct' => '0',
      ],
      [
        'id' => '3',
        'value' => '3 m',
        'quistionId' => '1',
        'is_correct' => '0',
      ],

      [
        'id' => '4',
        'value' => 'الإله ',
        'quistionId' => '2',
        'is_correct' => '0',
      ],
      [
        'id' => '5',
        'value' => 'الحاكم',
        'quistionId' => '2',
        'is_correct' => '1',
      ],
      [
        'id' => '6',
        'value' => 'الجندي',
        'quistionId' => '2',
        'is_correct' => '0',
      ],
      [
        'id' => '7',
        'value' => 'النبي محمد صلى الله عليه وسلم',
        'quistionId' => '3',
        'is_correct' => '1',
      ],
      [
        'id' => '8',
        'value' => ' عمر بن الخطاب رضي الله تعالى عنه ',
        'quistionId' => '3',
        'is_correct' => '0',
      ],
      [
        'id' => '9',
        'value' => ' أبو بكر الصديق رضي الله تعالى عنه ',
        'quistionId' => '3',
        'is_correct' => '0',
      ],

      ///////////////////////////////
      [
        'id' => '10',
        'value' => ' لا',
        'quistionId' => '4',
        'is_correct' => '1',
      ],
      [
        'id' => '11',
        'value' => ' في',
        'quistionId' => '4',
        'is_correct' => '0',
      ],
      [
        'id' => '12',
        'value' => 'ق',
        'quistionId' => '4',
        'is_correct' => '0',
      ],
      //////////////////////////////////////////////////////////

    ];
    \App\Models\Option::insert($option);
  }
}
