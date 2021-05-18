<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOjolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ojol', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->enum('type_kendaraan',['mobil','motor','pick up']);
            $table->string('nama_kendaraan');
            $table->string('warna_kendaraan');
            $table->string('nomor_kendaraan');
            $table->string('avatar');
            $table->string('photo_kendaraan');
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
        Schema::dropIfExists('ojol');
    }
}
