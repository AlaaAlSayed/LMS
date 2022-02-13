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
            $table->timestamps();

            $table->foreignId('studentId')->nullable()->constraint();
            $table->foreignId('subjectId')->nullable()->constraint();
            $table->foreignId('assignmentId')->nullable()->constraint();

            $table->float('answer');
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
