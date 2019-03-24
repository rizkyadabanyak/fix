<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kategori_item_id');
            $table->string('nama');
            $table->unsignedInteger('harga');
            $table->unsignedInteger('persediaan');
            $table->string('gambar');
            $table->timestamps();

            $table->foreign('kategori_item_id')->references('id')->on('kategori_items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
