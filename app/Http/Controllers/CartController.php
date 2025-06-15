<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $keranjangbelanja = DB::table('keranjangbelanja')->paginate(20);
        return view('page.cart', ['keranjangbelanja' => $keranjangbelanja]);
    }

    public function search(Request $request): View
    {
        $search = $request->input('search');
        $pagination = $request->query('pagination', 20);

        $query = DB::table('keranjangbelanja');

        if (!empty($search)) {
            $query->where('KodeBarang', 'like', '%' . $search . '%');
        }

        $keranjangbelanja = $query->paginate($pagination);

        return view('page.cart', [
            'keranjangbelanja' => $keranjangbelanja,
            'search' => $search
        ]);
    }

    public function add(): View
    {

        return view('page.addCart');
    }

    public function store(Request $request): RedirectResponse
    {
        DB::table('keranjangbelanja')->insert([
            'KodeBarang' => $request->KodeBarang,
            'Jumlah' => $request->Jumlah,
            'Harga' => $request->Harga
        ]);
        return redirect('/cart');
    }

    public function edit(int $ID): View
    {
        $keranjangbelanja = DB::table('keranjangbelanja')->where('ID', $ID)->get();
        return view('page.editCart', ['keranjangbelanja' => $keranjangbelanja]);
    }

    public function update(Request $request): RedirectResponse
    {
        DB::table('keranjangbelanja')->where('ID', $request->ID)->update([
            'KodeBarang' => $request->KodeBarang,
            'Jumlah' => $request->Jumlah,
            'Harga' => $request->Harga
        ]);
        return redirect('/cart');
    }
    public function delete(int $ID): RedirectResponse
    {
        DB::table('keranjangbelanja')->where('ID', $ID)->delete();

        return redirect('/cart');
    }
}