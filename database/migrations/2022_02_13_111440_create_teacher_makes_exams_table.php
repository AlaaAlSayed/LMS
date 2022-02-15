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
            $table->foreignId('teacherId')->nullable()->constraint();
            $table->foreignId('subjectId')->nullable()->constraint();
            $table->foreignId('examId')->nullable()->constraint();
            $table->time('time');
            $table->date('date');
            $table->float('min_score');
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
