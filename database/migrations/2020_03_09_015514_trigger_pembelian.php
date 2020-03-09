<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class TriggerPembelian extends Migration
{
    /**
     * Date : 08-03-2020
     * Description : Create trigger pembelian(on insert)
     * Developer : Ari
     * Status : Create
     */
    public function up()
    {
        $query  ="
                create or replace function pembelian_insert() returns trigger as \$pb_insert\$
                    begin
                        if (TG_OP = 'INSERT') then
                            insert into barang_stok(id_barang, total_barang, jenis_stok)
                                select id_barang, jumlah, 'in' from inserted;
                        end if;
                        return null;
                    end;
                \$pb_insert\$ language plpgsql ";
        DB::statement($query);

        $query  = "
                create trigger pembelian_after_insert
                AFTER INSERT ON pembelian_dt
                REFERENCING NEW TABLE AS inserted
                FOR EACH STATEMENT EXECUTE PROCEDURE pembelian_insert() ";
        DB::statement($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP TRIGGER IF EXISTS pembelian_after_insert ON pembelian_dt");
    }
}
