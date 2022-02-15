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
    {//teacherContactStudent	teacherId	studentId	message
        Schema::create('teacher_contacts_students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacherId')->nullable()->constraint();
            $table->foreignId('studentId')->nullable()->constraint();
            $table->text('message');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_contacts_students');
    }
};
