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
          //  $table->timestamps();

            $table->foreignId('studentId')->nullable()->constraint();
            $table->foreignId('subjectId')->nullable()->constraint();
            $table->foreignId('examId')->nullable()->constraint();

            $table->float('result');

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
