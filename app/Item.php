<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\KategoriItem as kategori;
use App\Keranjang;
use App\Transaksi;
use App\DetailTransaksi;

class Item extends Model
{
    protected $guarded = [];

    public function kategori(){
        return $this->belongsTo(Kategori::class,'kategori_item_id');
        //di gunakan d tabel penyambung
    }

    public function keranjang(){
        return $this->hasOne(Keranjang::class);

        //hasOne&hasMany d gunakan di tabel induk
        //hasOne iku one to one
        //hasMany one to many
        //belongTo relasai inverse one to many
    }

    public function transaksi(){
        return $this->hasManyThrough(Transaksi::class,DetailTransaksi::class);
    }

}
