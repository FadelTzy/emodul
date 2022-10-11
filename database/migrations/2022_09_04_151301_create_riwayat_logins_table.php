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
        Schema::create('riwayat_logins', function (Blueprint $table) {
            $table->id();
            $table->string('id_user')->nullable();
            $table->string('nama')->nullable();
            $table->string('tipe')->nullable()->comment('1 login 2 kuis');
            $table->string('id_kuis')->nullable();
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
        Schema::dropIfExists('riwayat_logins');
    }
};
