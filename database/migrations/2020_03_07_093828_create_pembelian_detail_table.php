<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembelianDetailTable extends Migration
{
    /**
     * Date : 07-03-2020
     * Description : Create table pembelian_dt
     * Developer : Ari
     * Status : Create
     */
    public function up()
    {
        Schema::table('pembelian_dt', function (Blueprint $table) {
            $table->uuid('id')->unique()->default(DB::Raw('uuid_generate_v4()'));
            $table->uuid('id_pembelian');
            $table->uuid('id_barang');
            $table->integer('jumlah');
            $table->integer('harga');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembelian_dt');
    }
}
