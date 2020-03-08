<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembelianTable extends Migration
{
    /**
     * Date : 07-03-2020
     * Description : Create table pembelian
     * Developer : Ari
     * Status : Create
     */

    /**
     * Date : 08-03-2020
     * Description : mengubah tipe data nonota
     * Developer : Ari
     * Status : Edit
     */
    public function up()
    {
        Schema::table('pembelian', function (Blueprint $table) {
            $table->uuid('id')->unique()->default(DB::Raw('uuid_generate_v4()'));
            $table->string('nonota', 50)->nullable()->change();
            $table->date('tanggal_nota')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembelian');
    }
}
