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
    {//studentPayTransaction studentId	processID	status
        Schema::create('student_pay_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('studentId')->references('id')->on('students')->onDelete('cascade');
            $table->foreignId('transactionId')->references('id')->on('transactions')->onDelete('cascade');
            $table->string('status');
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
        Schema::dropIfExists('student_pay_transactions');
    }
};
