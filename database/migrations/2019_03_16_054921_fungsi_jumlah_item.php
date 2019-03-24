<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FungsiJumlahItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::unprepared('
            CREATE OR REPLACE FUNCTION jumlah_item(id_detail_transaksi INT) RETURNS INT
            BEGIN
                DECLARE qty INT;
                SET qty = (SELECT jumlah FROM detail_transaksis WHERE id= id_detail_transaksi);
                RETURN qty;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
