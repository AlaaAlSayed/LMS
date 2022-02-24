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
        Schema::create('applicant_fill_applications', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // applicantId	adminId	applicationId	answer
            $table->foreignId('applicantId')->references('id')->on('applicants')->onDelete('cascade');
            $table->foreignId('adminId')->references('id')->on('admins')->onDelete('cascade');
            $table->foreignId('applicationId')->references('id')->on('applications')->onDelete('cascade');
            $table->text('answer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicant_fill_applications');
    }
};
