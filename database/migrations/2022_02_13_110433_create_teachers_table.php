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
    {  //teacher	teacherId	name	email	phone	government	city	street

        Schema::create('teachers', function (Blueprint $table) {
            // $table->id();
            $table->foreignId('id')->references('id')->on('users')->onDelete('cascade')->unique();
            $table->string('email')->unique;
            $table->integer('phone');
            $table->string('picture_path');

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
        Schema::dropIfExists('teachers');
    }
};
