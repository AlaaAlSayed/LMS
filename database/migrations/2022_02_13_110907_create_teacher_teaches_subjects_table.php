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
            $table->id();
            $table->foreignId('teacherId')->nullable()->constraint();
            $table->foreignId('subjectId')->nullable()->constraint();
            $table->foreignId('classroomId')->nullable()->constraint();

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
