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
    {//TeacherMakeExam	teacherId	subjectId	examId	time	date	min_score
        Schema::create('teacher_makes_exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacherId')->references('id')->on('teachers')->onDelete('cascade');
            $table->foreignId('subjectId')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreignId('examId')->references('id')->on('exams')->onDelete('cascade');
           
            $table->time('start');
            $table->time('finish');
            $table->date('date');
            $table->float('min_score');
            
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
        Schema::dropIfExists('teacher_makes_exams');
    }
};
