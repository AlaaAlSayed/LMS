<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {//TeacherTeachesSubject	teacherId	subjectId	classId
        Schema::create('teacher_teaches_subjects', function (Blueprint $table) {
            $table->integer('id')->unique();
            // $table->unique( ['teacherId', 'subjectId','classroomId'],'id');
            $table->primary(['teacherId', 'subjectId','classroomId']);
            $table->foreignId('teacherId')->references('id')->on('teachers')->onDelete('cascade');
            $table->foreignId('subjectId')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreignId('classroomId')->references('id')->on('classrooms')->onDelete('cascade');
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_teaches_subjects');
    }
};
