<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
	public function index(Request $request){
        $keranjangbelanja = DB::table('keranjangbelanja')->paginate(20);
		return view('cart',['keranjangbelanja' => $keranjangbelanja]);
    }

    public function search(Request $request){
        $search = $request->search;
        $pagination = $request->query('pagination',20);
        if($search == null){
            $keranjangbelanja = DB::table('keranjangbelanja')->paginate($pagination);
        }else{
            $keranjangbelanja = DB::table('keranjangbelanja')
            ->where('KodeBarang','like',"%".$search."%")
            ->paginate($pagination);
        }

    return view('cart',['keranjangbelanja' => $keranjangbelanja]);
    }

    public function add(){

	return view('addCart');
    }

    public function store (Request $request) {
        DB::table('keranjangbelanja')->insert([
            'KodeBarang' => $request->KodeBarang,
            'Jumlah' => $request->Jumlah,
            'Harga' => $request->Harga
        ]);
        return redirect('/cart');

    }

    public function edit($ID) {
        $keranjangbelanja = DB::table('keranjangbelanja')->where('ID', $ID)->get();
    return view('editCart',['keranjangbelanja' => $keranjangbelanja]);
    }

    public function update(Request $request){
        DB::table('keranjangbelanja')->where('ID',$request->ID)->update([
            'KodeBarang' => $request->KodeBarang,
            'Jumlah' => $request->Jumlah,
            'Harga' => $request->Harga
        ]);
    return redirect('/cart');
    }
    public function delete($ID){
        DB::table('keranjangbelanja')->where('ID',$ID)->delete();

    return redirect('/cart');
    }
}
