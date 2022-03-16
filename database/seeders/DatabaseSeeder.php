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

    ////////////////////// USERS /////////////////////////////
    DB::table('users')->delete();
    $users = [

      [
        'id' => '1',
        'name' => 'Admin ',
        'username' => 'admin',
        'password' => password_hash('password', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '1',
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '2',
        'name' => 'khairy',
        'username' => 'admin1',
        'password' => password_hash('password', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '1',
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      //----------------teachers
      [

        'id' => '3',
        'name' => 'teacher',
        'username' => 'teacher',
        'password' => password_hash('password', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '2',
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],

      [
        'id' => '4',
        'name' => 'Ali - Science teacher',
        'username' => 'teacher1',
        'password' => password_hash('password', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '2',
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '5',
        'name' => 'Gamal - Religion teacher',
        'username' => 'teacher2',
        'password' => password_hash('password', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '2',
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '6',
        'name' => 'Alaa - Arabic teacher',
        'username' => 'teacher3',
        'password' => password_hash('password', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '2',
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '7',
        'name' => 'Mostafa - English teacher',
        'username' => 'teacher4',
        'password' => password_hash('password', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '2',
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '8',
        'name' => 'Hadeer Math teacher',
        'username' => 'teacher5',
        'password' => password_hash('password', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '2',
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '9',
        'name' => 'Rahma History teacher',
        'username' => 'teacher6',
        'password' => password_hash('password', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '2',
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '10',
        'name' => 'Mohamed Art teacher',
        'username' => 'teacher7',
        'password' => password_hash('password', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '2',
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],

      //-------------students

      [
        'id' => '11',
        'name' => 'student',
        'username' => 'student',
        'password' => password_hash('password', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '3',
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '12',
        'name' => 'Ahmed',
        'username' => 'student1',
        'password' => password_hash('password', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '3',
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],

      [
        'id' => '13',
        'name' => 'Mahmoud',
        'username' => 'student2',
        'password' => password_hash('password', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '3',
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '14',
        'name' => 'Yassin',
        'username' => 'student3',
        'password' => password_hash('password', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '3',
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '15',
        'name' => 'Nader',
        'username' => 'student4',
        'password' => password_hash('password', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '3',
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '16',
        'name' => 'Mona',
        'username' => 'student5',
        'password' => password_hash('password', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '3',
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '17',
        'name' => 'Noha',
        'username' => 'student6',
        'password' => password_hash('password', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '3',
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '18',
        'name' => 'Shahd',
        'username' => 'student7',
        'password' => password_hash('password', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '3',
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '19',
        'name' => 'Kholoud',
        'username' => 'student8',
        'password' => password_hash('password', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '3',
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '20',
        'name' => 'Esraa',
        'username' => 'student9',
        'password' => password_hash('password', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '3',
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '21',
        'name' => 'Hager',
        'username' => 'student10',
        'password' => password_hash('password', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '3',
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '22',
        'name' => 'Asmaa',
        'username' => 'student11',
        'password' => password_hash('password', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '3',
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '23',
        'name' => 'Sara',
        'username' => 'student12',
        'password' => password_hash('password', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '3',
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '24',
        'name' => 'Shereen',
        'username' => 'student13',
        'password' => password_hash('password', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '3',
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '25',
        'name' => 'Sama',
        'username' => 'student14',
        'password' => password_hash('password', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '3',
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
      [
        'id' => '26',
        'name' => 'Rana',
        'username' => 'student15',
        'password' => password_hash('password', PASSWORD_DEFAULT), // password
        'remember_token' => Str::random(10),
        'roleId' => '3',
        'government' => 'country',
        'city' => 'city',
        'street' => 'streetName',
      ],
    ];
    \App\Models\User::insert($users);

    ///////////////////////////ADMINS////////////////////////////////////////////
    DB::table('admins')->delete();
    $admins = [
      [
        'id' => '1',
        'email' => 'admin@gmail.com',
        'phone' => '01278194322',
      ],
      [
        'id' => '2',
        'email' => 'khairy@gmail.com',
        'phone' => '01278194322',
      ],
    ];
    \App\Models\Admin::insert($admins);

    /////////////////////// STUDENTS ///////////////////////////////
    DB::table('students')->delete();

    $students = [
      [
        'classroomId' => '1',
        'id' => '11',
        'phone' => '01255007346',
        'picture_path' => 'student-image_1647224432.png', //boy 
        
      ],
      [
        'id' => '12',
        'phone' => '01255007346',
        'picture_path' => 'student-image_1647224432.png', //boy 
        'classroomId' => '1',
      ],
      [
        'id' => '13',
        'phone' => '01255007346',
        'picture_path' => 'student-image_1647224432.png', //boy 
        'classroomId' => '1',
      ],
      [
        'id' => '14',
        'phone' => '01255007346',
        'picture_path' => 'student-image_1647224432.png', //boy 
        'classroomId' => '3',
      ],
      [
        'id' => '15',
        'phone' => '01255007346',
        'picture_path' => 'student-image_1647224432.png', //boy 
        'classroomId' => '3',
      ],
      [
        'id' => '16',
        'phone' => '01255007346',
        'picture_path' => 'student-image_1647223965.png', //girl 
        'classroomId' => '3',
      ],
      [
        'id' => '17',
        'phone' => '01255007346',
        'picture_path' => 'student-image_1647223965.png', //girl 
        'classroomId' => '3',
      ],
      [
        'id' => '18',
        'phone' => '01255007346',
        'picture_path' => 'student-image_1647223965.png', //girl 
        'classroomId' => '5',
      ],
      [
        'id' => '19',
        'phone' => '01255007346',
        'picture_path' => 'student-image_1647223965.png', //girl 
        'classroomId' => '5',
      ],
      [
        'id' => '20',
        'phone' => '01255007346',
        'picture_path' => 'student-image_1647223965.png', //girl 
        'classroomId' => '5',
      ],
      [
        'id' => '21',
        'phone' => '01255007346',
        'picture_path' => 'student-image_1647223965.png', //girl 
        'classroomId' => '5',
      ],
      [
        'id' => '22',
        'phone' => '01255007346',
        'picture_path' => 'student-image_1647223965.png', //girl 
        'classroomId' => '7',
      ],
      [
        'id' => '23',
        'phone' => '01255007346',
        'picture_path' => 'student-image_1647223965.png', //girl 
        'classroomId' => '7',
      ],
      [
        'id' => '24',
        'phone' => '01255007346',
        'picture_path' => 'student-image_1647223965.png', //girl 
        'classroomId' => '7',
      ],
      [
        'id' => '25',
        'phone' => '01255007346',
        'picture_path' => 'student-image_1647223965.png', //girl 
        'classroomId' => '8',
      ],
      [
        'id' => '26',
        'phone' => '01255007346',
        'picture_path' => 'student-image_1647223965.png', //girl 
        'classroomId' => '8',
      ],
    ];
    \App\Models\Student::insert($students);


    ///////////////////////////TEACHERS////////////////////////////////////////////
    DB::table('teachers')->delete();
    $teachers = [
      [
        'id' => '3',
        'email' => 'teacher@gmail.com',
        'phone' => '01278194322',
        'picture_path' => 'teacher-image_1647226597.jpg', //man
      ],
      [
        'id' => '4',
        'email' => 'ali@gmail.com',
        'phone' => '01278194322',
        'picture_path' => 'teacher-image_1647226597.jpg', //man
      ],
      [
        'id' => '5',
        'email' => 'gamal@gmail.com',
        'phone' => '01278194322',
        'picture_path' => 'teacher-image_1647226597.jpg', //man
      ],
      [
        'id' => '6',
        'email' => 'alaa@gmail.com',
        'phone' => '01278194322',
        'picture_path' => 'teacher-image_1647226690.png', //woman
      ],
      [
        'id' => '7',
        'email' => 'mostafa@gmail.com',
        'phone' => '01278194322',
        'picture_path' => 'teacher-image_1647226597.jpg', //man
      ],
      [
        'id' => '8',
        'email' => 'hadeer@gmail.com',
        'phone' => '01278194322',
        'picture_path' => 'teacher-image_1647226690.png', //woman
      ],
      [
        'id' => '9',
        'email' => 'rahma@gmail.com',
        'phone' => '01278194322',
        'picture_path' => 'teacher-image_1647226690.png', //woman
      ],
      [
        'id' => '10',
        'email' => 'mohamed@gmail.com',
        'phone' => '01278194322',
        'picture_path' => 'teacher-image_1647226597.jpg', //man
      ],


    ];
    \App\Models\Teacher::insert($teachers);


   //////////////////////CLASSROOMS//////////////////////////////////
   DB::table('classrooms')->delete();
   $classrooms = [
     [
       'id' => '1',
       'level' => '1',
       'capacity' => '20',
       'code' => '1/1',

     ],
    //  [
    //    'id' => '2',
    //    'level' => '1',
    //    'capacity' => '20',
    //    'code' => '1/2',

    //  ],
     [
       'id' => '3',
       'level' => '2',
       'capacity' => '20',
       'code' => '2/1',

     ],
    //  [
    //    'id' => '4',
    //    'level' => '2',
    //    'capacity' => '20',
    //    'code' => '2/2',

    //  ],
     [
       'id' => '5',
       'level' => '3',
       'capacity' => '20',
       'code' => '3/1',

     ],
    //  [
    //    'id' => '6',
    //    'level' => '3',
    //    'capacity' => '20',
    //    'code' => '3/2',

    //  ],
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

    ///////////////////////////SUBJECTS/////////////////////////////////
    DB::table('subjects')->delete();
    $subject = [

      ['id' => '1', 'name' => 'arabic', 'classroomId' => '1',],
      ['id' => '2', 'name' => 'math', 'classroomId' => '1',],
      ['id' => '3', 'name' => 'english', 'classroomId' => '1',],

      ['id' => '4', 'name' => 'arabic', 'classroomId' => '3'],
      ['id' => '5', 'name' => 'math', 'classroomId' => '3',],
      ['id' => '6', 'name' => 'english', 'classroomId' => '3',],

      ['id' => '7', 'name' => 'arabic', 'classroomId' => '5',],
      ['id' => '8', 'name' => 'english', 'classroomId' => '5',],
      ['id' => '9', 'name' => 'math', 'classroomId' => '5',],

      ['id' => '10', 'name' => 'arabic', 'classroomId' => '7',],
      ['id' => '11', 'name' => 'math', 'classroomId' => '7',],
      ['id' => '12', 'name' => 'english', 'classroomId' => '7',],
      ['id' => '13', 'name' => 'science', 'classroomId' => '7',],
      ['id' => '14', 'name' => 'history', 'classroomId' => '7',],
      ['id' => '15', 'name' => 'religion', 'classroomId' => '7',],

      ['id' => '16', 'name' => 'arabic', 'classroomId' => '8',],
      ['id' => '17', 'name' => 'math', 'classroomId' => '8',],
      ['id' => '18', 'name' => 'english', 'classroomId' => '8',],
      ['id' => '19', 'name' => 'science', 'classroomId' => '8',],
      ['id' => '20', 'name' => 'history', 'classroomId' => '8',],
      ['id' => '21', 'name' => 'religion', 'classroomId' => '8',],

    ];
    \App\Models\Subject::insert($subject);

    //////////////////////// SUBJECT MATERIAL //////////////////////////
 
    DB::table('subject_materials')->delete();
    $materials = [

      ['id' => '1', 'subjectId'=> '1','name' => 'arabic lesson 1', 'material' => 'material_1647144537.pdf',],
      ['id' => '2', 'subjectId'=> '2','name' => 'math lesson 1', 'material' => 'material_1647144537.pdf',],
      ['id' => '3', 'subjectId'=> '3','name' => 'english lesson 1', 'material' => 'material_1647144537.pdf',],

      ['id' => '4', 'subjectId'=> '4','name' => 'arabic2 lesson 1', 'material' => 'material_1647144537.pdf',],
      ['id' => '5', 'subjectId'=> '5','name' => 'math2 lesson 1', 'material' => 'material_1647144537.pdf',],
      ['id' => '6', 'subjectId'=> '6','name' => 'english2 lesson 1', 'material' => 'material_1647144537.pdf',],

      ['id' => '7', 'subjectId'=> '7','name' => 'arabic3 lesson 1', 'material' => 'material_1647144537.pdf',],
      ['id' => '8', 'subjectId'=> '8','name' => 'math3 lesson 1', 'material' => 'material_1647144537.pdf',],
      ['id' => '9', 'subjectId'=> '9','name' => 'english3 lesson 1', 'material' => 'material_1647144537.pdf',],
     
      ['id' => '10', 'subjectId'=> '10','name' => 'arabic4 lesson 1', 'material' => 'material_1647144537.pdf',],
      ['id' => '11', 'subjectId'=> '11','name' => 'math4 lesson 1', 'material' => 'material_1647144537.pdf',],
      ['id' => '12', 'subjectId'=> '12','name' => 'english4 lesson 1', 'material' => 'material_1647144537.pdf',],
      ['id' => '13', 'subjectId'=> '13','name' => 'science lesson 1', 'material' => 'material_1647144537.pdf',],
      ['id' => '14', 'subjectId'=> '14','name' => 'history lesson 1', 'material' => 'material_1647144537.pdf',],
      ['id' => '15', 'subjectId'=> '15','name' => 'religion lesson 1', 'material' => 'material_1647144537.pdf',],
     
      ['id' => '16', 'subjectId'=> '16','name' => 'arabic4 lesson 1', 'material' => 'material_1647144537.pdf',],
      ['id' => '17', 'subjectId'=> '17','name' => 'math4 lesson 1', 'material' => 'material_1647144537.pdf',],
      ['id' => '18', 'subjectId'=> '18','name' => 'english4 lesson 1', 'material' => 'material_1647144537.pdf',],
      ['id' => '19', 'subjectId'=> '19','name' => 'science lesson 1', 'material' => 'material_1647144537.pdf',],
      ['id' => '20', 'subjectId'=> '20','name' => 'history lesson 1', 'material' => 'material_1647144537.pdf',],
      ['id' => '21', 'subjectId'=> '21','name' => 'religion lesson 1', 'material' => 'material_1647144537.pdf',],
     
    ];
    \App\Models\SubjectMaterial::insert($materials);

    //////////////////////// TEACHER TEACH SUBJECT //////////////////////////

    DB::table('teacher_teaches_subjects')->delete();
    $teaches = [
   

      ['id' => '1', 'teacherId' => '6', 'subjectId' => '1','classroomId' => '1'],//arabic
      ['id' => '2', 'teacherId' => '6', 'subjectId' => '4','classroomId' => '3'],//arabic
      ['id' => '3', 'teacherId' => '6', 'subjectId' => '7','classroomId' => '5'],//arabic
      ['id' => '4', 'teacherId' => '6', 'subjectId' => '10','classroomId' => '7'],//arabic
      ['id' => '5', 'teacherId' => '6', 'subjectId' => '16','classroomId' => '8'],//arabic

      ['id' => '6', 'teacherId' => '8', 'subjectId' => '2','classroomId' => '1'],//math
      ['id' => '7', 'teacherId' => '8', 'subjectId' => '5','classroomId' => '3'],//math
      ['id' => '8', 'teacherId' => '8', 'subjectId' => '8','classroomId' => '5'],//math
      ['id' => '9', 'teacherId' => '8', 'subjectId' => '11','classroomId' => '7'],//math
      ['id' => '10', 'teacherId' => '8', 'subjectId' => '17','classroomId' => '8'],//math

      ['id' => '11', 'teacherId' => '7', 'subjectId' => '3','classroomId' => '1'],//english
      ['id' => '12', 'teacherId' => '7', 'subjectId' => '6','classroomId' => '3'],//english
      ['id' => '13', 'teacherId' => '7', 'subjectId' => '9','classroomId' => '5'],//english
      ['id' => '14', 'teacherId' => '7', 'subjectId' => '12','classroomId' => '7'],//english
      ['id' => '15', 'teacherId' => '7', 'subjectId' => '18','classroomId' => '8'],//english

      ['id' => '16', 'teacherId' => '4', 'subjectId' => '13','classroomId' => '7'],//science
      ['id' => '17', 'teacherId' => '4', 'subjectId' => '19','classroomId' => '8'],//science

      ['id' => '18', 'teacherId' => '9', 'subjectId' => '14','classroomId' => '7'],//history
      ['id' => '19', 'teacherId' => '9', 'subjectId' => '20','classroomId' => '8'],//history

      ['id' => '20', 'teacherId' => '5', 'subjectId' => '15','classroomId' => '7'],//religion
      ['id' => '21', 'teacherId' => '5', 'subjectId' => '21','classroomId' => '8'],//religion


      // ['id' => '1', 'teacherId' => '10', 'subjectId' => '1','classroomId' => '1'],//art
    
    ];
    \App\Models\teacher_teaches_subjects::insert($teaches);


    //////////////////////// ASSIGNMENT //////////////////////////
    DB::table('assignments')->delete();
    $assignments = [

      ['id' => '1', 'name' => 'Assignment_1647234091.pdf'],
      ['id' => '2', 'name' => 'Assignment_1647234091.pdf'],
      ['id' => '3', 'name' => 'Assignment_1647234091.pdf'],

    ];
    \App\Models\Assignment::insert($assignments);

    //////////////////////// TEACHER ATTACH ASSIGNMENT //////////////////////////


    //////////////////////// STUDENT UPLOAD ASSIGNMENT //////////////////////////






    //////////////////////// EXAMS //////////////////////////
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


    //////////////////////// TEACHER MAKE EXAM //////////////////////////

    //////////////////////// STUDENT TAKE EXAM //////////////////////////

}
