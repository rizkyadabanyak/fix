<?php

namespace App\Http\Controllers;

use App\Keranjang;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerTransaksi extends Controller
{
    public function store()
    {
        DB::beginTransaction();
        try {
            auth()->user()
                ->transaksi()
                ->create(request()->all())
                ->details()
                ->createMany(Keranjang::all()->map(function ($keranjang) {
                    return [
                        'item_id' => $keranjang->item_id,
                        'jumlah' => $keranjang->jumlah,
                        'total_keseluruhan' => $keranjang->item->harga * $keranjang->jumlah
                    ];
                })->toArray());
            DB::table('keranjangs')->delete();

            DB::commit();
        }catch (Exception $e){
        DB::rollBack();
         }
         return redirect()->route('transaksi.show',Transaksi::latest()->first());
    }

    public function index()
    {

        $transaksis = Transaksi::latest()->get();

        return view('transaksi.index', compact('transaksis'));
    }

    public function show(Transaksi $transaksis)
    {

        return view('transaksi.show', compact('transaksis'));
    }
}