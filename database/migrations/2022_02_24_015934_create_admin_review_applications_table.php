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
        Schema::create('admin_review_applications', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('adminId')->references('id')->on('admins')->onDelete('cascade');
            $table->foreignId('applicationId')->references('id')->on('applications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_review_applications');
    }
};
