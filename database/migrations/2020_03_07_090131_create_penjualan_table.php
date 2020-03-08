<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenjualanTable extends Migration
{
    /**
     * Date : 07-03-2020
     * Description : Create table penjualan
     * Developer : Ari
     * Status : Create
     */

    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->uuid('id')->unique()->default(DB::Raw('uuid_generate_v4()'));
            $table->integer('rp_bayar');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan');
    }
}
