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
    {
        Schema::create('student_take_exams', function (Blueprint $table) {
            //studentID	subjectID	examID	result
            $table->id();
            
            $table->foreignId('studentId')->references('id')->on('students')->onDelete('cascade');
            $table->foreignId('subjectId')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreignId('examId')->references('id')->on('exams')->onDelete('cascade');
            $table->float('result');

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
        Schema::dropIfExists('student_take_exams');
    }
};
