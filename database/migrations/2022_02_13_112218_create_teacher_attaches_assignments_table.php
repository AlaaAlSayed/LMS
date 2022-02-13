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
    {//TeacherAttatchAssignment	teacherId	subjectId	assignmentId	deadline
        Schema::create('teacher_attaches_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacherId')->nullable()->constraint();
            $table->foreignId('subjectId')->nullable()->constraint();
            $table->foreignId('assignmentId')->nullable()->constraint();
            $table->date('deadline');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_attaches_assignments');
    }
};
