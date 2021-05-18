<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOjolDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ojol_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_transaksi')->unsigned();
            $table->integer('id_ojol')->unsigned();
            $table->enum('status',['pick up','diantarkan','selesai']);
            $table->timestamps();

            $table->foreign('id_transaksi')->references('id')->on('transaksi')->onDelete('cascade');
            $table->foreign('id_ojol')->references('id')->on('ojol')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ojol_detail');
    }
}
