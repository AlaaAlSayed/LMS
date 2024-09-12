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
        Schema::create('admin_notify_students', function (Blueprint $table) {
          //  adminNotifyStudent	studentID	adminID	message
            $table->id();
            $table->timestamps();

            $table->foreignId('adminID')->nullable()->constraint();
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
        Schema::dropIfExists('admin_notify_students');
    }
};
