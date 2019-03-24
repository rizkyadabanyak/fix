<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FungsiItemId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::unprepared('
            CREATE OR REPLACE FUNCTION item_id(id_detail_transaksi INT) RETURNS INT
            BEGIN
                DECLARE id_item INT;
                SET id_item = (SELECT item_id FROM detail_transaksis WHERE id= id_detail_transaksi);
                RETURN id_item;
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
