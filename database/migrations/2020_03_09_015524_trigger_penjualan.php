<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TriggerPenjualan extends Migration
{
    /**
     * Date : 08-03-2020
     * Description : Create trigger penjualan(on insert)
     * Developer : Ari
     * Status : Create
     */
    public function up()
    {
        $query  ="
                create or replace function penjualan_insert() returns trigger as \$pj_insert\$
                    begin
                        if (TG_OP = 'INSERT') then
                            insert into barang_stok(id_barang, total_barang, jenis_stok)
                                select id_barang, jumlah, 'in' from inserted;
                        end if;
                        return null;
                    end;
                \$pj_insert\$ language plpgsql ";
        DB::statement($query);

        $query  = "
                create trigger penjualan_after_insert
                AFTER INSERT ON penjualan_dt
                REFERENCING NEW TABLE AS inserted
                FOR EACH STATEMENT EXECUTE PROCEDURE penjualan_insert() ";
        DB::statement($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP TRIGGER IF EXISTS penjualan_after_insert ON penjualan_dt");
    }
}
