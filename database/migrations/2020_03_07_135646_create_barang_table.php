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

    /**
     * Date : 08-03-2020
     * Description : Mengubah panjang karakter/tipe data kode_barang & nama_barang
     * Developer : Ari
     * Status : Edit
     */
    public function up()
    {
        Schema::table('barang', function (Blueprint $table) {
            $table->uuid('id')->unique()->default(DB::Raw('uuid_generate_v4()'));
            $table->primary('id');
            $table->string('kode_barang', 20)->change();
            $table->string('nama_barang', 100)->change();
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
