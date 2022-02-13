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
        Schema::create('admins__notify__students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('studentId')->nullable()->constraint();
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
        Schema::dropIfExists('admins__notify__students');
    }
};
