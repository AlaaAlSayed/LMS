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
        Schema::create('student_upload_assignments', function (Blueprint $table) {
            //	studentID	subjectID	assignmentID	answer
            $table->id();
             
            $table->foreignId('studentId')->references('id')->on('students')->onDelete('cascade');
            $table->foreignId('subjectId')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreignId('assignmentId')->references('id')->on('assignments')->onDelete('cascade');
            $table->text('answer');

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
        Schema::dropIfExists('student_upload_assignments');
    }
};
