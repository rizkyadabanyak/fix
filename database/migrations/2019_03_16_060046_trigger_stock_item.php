<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TriggerStockItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::unprepared('
            CREATE OR REPLACE TRIGGER trigger_stock_item
            AFTER INSERT ON detail_transaksis
            FOR EACH ROW
            BEGIN 
                CALL mengurangi_stock(NEW.id);
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
