<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangTable extends Migration
{
    /**
     * Date : 07-03-2020
     * Description : Create table barang
     * Developer : Ari
     * Status : Create
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->uuid('id')->unique()->default(DB::Raw('uuid_generate_v4()'));
            $table->string('kode_barang', 20);
            $table->string('nama_barang', 100);
            $table->integer('harga_jual');
            $table->string('gambar_barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
