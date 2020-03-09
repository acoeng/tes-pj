<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenjualanDetailTable extends Migration
{
    /**
     * Date : 07-03-2020
     * Description : Create table penjualan detail
     * Developer : Ari
     * Status : Create
     */
    public function up()
    {
        Schema::create('penjualan_dt', function (Blueprint $table) {
            $table->uuid('id')->unique()->default(DB::Raw('uuid_generate_v4()'));
            $table->uuid('id_penjualan');
            $table->uuid('id_barang');
            $table->integer('jumlah');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan_dt');
    }
}
