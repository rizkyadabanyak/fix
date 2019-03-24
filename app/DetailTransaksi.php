<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transaksi;
use App\Item;

class DetailTransaksi extends Model
{
    protected $guarded = [];

    public function transaksi(){

        return $this->belongsTo(Transaksi::class);

    }

    public function item(){
        return $this->belongsTo(Item::class);
    }
}
