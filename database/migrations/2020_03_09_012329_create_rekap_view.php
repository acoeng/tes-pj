<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateRekapView extends Migration
{
    /**
     * Date : 09-03-2020
     * Description : Create view transaksi
     * Developer : Ari
     * Status : Create
     */
    public function up()
    {
        $query = " 
                create or replace view view_rekap_transaksi as
                    select 
                        list.jumlah, 
                        list.tanggal, 
                        list.nama_barang[1] nama_barang
                    from 
                        (
                            select 
                                sum(penjualan_dt.jumlah) jumlah,
                                date(penjualan.created_at) tanggal,
                                array_agg(barang.nama_barang) nama_barang
                            from penjualan_dt 
                            join penjualan on penjualan_dt.id_penjualan = penjualan.id
                            join barang on penjualan_dt.id_barang = barang.id
                            group by 
                                date(penjualan.created_at),
                                penjualan_dt.id_barang
                        ) as list
                ";

        DB::statement($query);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("drop view view_rekap_transaksi");
    }
}
