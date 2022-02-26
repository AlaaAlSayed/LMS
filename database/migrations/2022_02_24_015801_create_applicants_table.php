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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            // applicantId	name	email	level	phone	government	city
            $table->string('name');
            $table->string('email')->unique();;
            $table->string('phone');
           
            $table-> integer('level');
          
            //address
            $table->string('government')->default('Cairo');
            $table->string('city')->default('Nasr City');
            $table->string('street')->default('65 walt disney');

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
        Schema::dropIfExists('applicants');
    }
};
