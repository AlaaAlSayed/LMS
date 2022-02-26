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
        Schema::create('admin_contact_applicants', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

          
            $table->foreignId('applicantId')->references('id')->on('applicants')->onDelete('cascade');
            $table->foreignId('adminId')->references('id')->on('admins')->onDelete('cascade');
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
        Schema::dropIfExists('admin_contact_applicants');
    }
};
