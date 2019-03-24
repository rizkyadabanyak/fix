<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = Item::doesntHave('keranjang')->where('persediaan','>',0)->get()->sortBy('nama');

        $itemkeranjangs = Item::has('keranjang')->get()->sortByDesc('keranjang.created_at');

        return view('home', compact(['items','itemkeranjangs']));
    }
}
