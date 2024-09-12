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
        Schema::create('teacher_contact_students', function (Blueprint $table) {
          //  teacherContactStudent	studentID	teacherID	message
            $table->id();
            $table->timestamps();

            $table->foreignId('studentId')->nullable()->constraint();
            $table->foreignId('teacherID')->nullable()->constraint();
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
        Schema::dropIfExists('teacher_contact_students');
    }
};
