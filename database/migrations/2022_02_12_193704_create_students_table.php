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
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
           
            // $table-> integer('classID');
            // $table->foreign('classID')->References('id')->on('class');
            $table->foreignId('classroomId')->nullable()->constraint();

            $table->string('picture_path');

            //address
            $table->string('government');
            $table->string('city');
            $table->string('street');


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
