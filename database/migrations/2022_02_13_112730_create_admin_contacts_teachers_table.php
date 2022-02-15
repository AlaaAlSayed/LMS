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
    {	//adminContactTeacher	teacherId	adminId	message
        Schema::create('admin_contacts_teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacherId')->nullable()->constraint();
            $table->foreignId('adminId')->nullable()->constraint();
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
        Schema::dropIfExists('admin_contacts_teachers');
    }
};
