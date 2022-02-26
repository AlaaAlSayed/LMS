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
        Schema::create('subject_materials', function (Blueprint $table) {
            //subjectID	material
            $table->id();

            $table->foreignId('subjectId')->references('id')->on('subjects')->onDelete('cascade');
            $table->string('name');
            $table->string('material_path');

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
        Schema::dropIfExists('subject_materials');
    }
};
