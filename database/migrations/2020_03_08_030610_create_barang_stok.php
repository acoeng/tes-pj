<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangStok extends Migration
{
    /**
     * Date : 07-03-2020
     * Description : Create table barang
     * Developer : Ari
     * Status : Create
     */
    public function up()
    {
        Schema::create('barang_stok', function (Blueprint $table) {
            $table->uuid('id')->unique()->default(DB::Raw('uuid_generate_v4()'));
            $table->uuid('id_barang');
            $table->integer('total_barang');
            $table->string('jenis_stok', 3);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_stok');
    }
}
