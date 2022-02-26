<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            //studentID	name	email	address	phone	birthdate	level	picture	classID	
            // $table->id();
            $table->foreignId('id')->references('id')->on('users')->onDelete('cascade')->unique();
            $table->string('phone');
            $table->foreignId('classroomId')->references('id')->on('classrooms')->onDelete('cascade');
            $table->string('picture_path')->nullable()->default(0);
            $table->date('birthdate')->nullable();

            // //address
            // $table->string('city')->default('Nasr City');
            // $table->string('street')->default('65 walt disney');

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
        Schema::dropIfExists('students');
    }
};
