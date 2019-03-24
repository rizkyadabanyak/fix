<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProsedurMenguragiStockItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::unprepared('
            CREATE OR REPLACE PROCEDURE mengurangi_stock(id_detail_transaksi INT)
            BEGIN
                UPDATE items
                SET persediaan = persediaan - jumlah_item(id_detail_transaksi)
                WHERE id = item_id(id_detail_transaksi);
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
