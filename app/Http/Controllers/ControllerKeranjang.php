<?php

namespace App\Http\Controllers;
use App\Keranjang;
use Illuminate\Http\Request;

class ControllerKeranjang extends Controller
{

   public function store()
   {
       if (request()->item_id){
           Keranjang::create(request()->all());
       }
       return redirect()->back();
   }
   public function update(Keranjang $keranjang){
       $keranjang->update(request()->all());

       return redirect()->back();
   }
   public function delete(Keranjang $keranjang){
       $keranjang->delete();

       return redirect()->back();
   }
}
