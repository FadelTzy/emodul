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
        Schema::create('history_quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('id_user')->nullable();
            $table->string('benar')->nullable();
            $table->string('salah')->nullable();
            $table->string('nilai')->nullable();
            $table->string('soal')->nullable();
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
        Schema::dropIfExists('history_quizzes');
    }
};
