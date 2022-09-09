<?php

namespace App\Http\Controllers;
use App\Models\Produk;

class ProdukController extends Controller{
    function index(){
        $data['list_produk'] = Produk::all();
        return view('produk.index', $data);
    }
    function create(){
        return view('produk.create');
    }
    function store(){
        $produk = new Produk;
        $produk->nama = request('nama');
        $produk->stok = request('stok');
        $produk->harga = request('harga');
        $produk->berat = request('berat');
        $produk->deskripsi = request('deskripsi');
        $produk->save();

        return redirect ('admin/produk')->with('succes', 'Data Berhasil Ditambahkan');
    
    }

    function show(Produk $produk){
        $data['produk'] = $produk;
        return view('produk.show', $data);

    }
    function edit(Produk $produk){
        $data['produk'] = $produk;
        return view('produk.edit', $data);

    }
    function update(Produk $produk){
        $produk->nama = request('nama');
        $produk->stok = request('stok');
        $produk->harga = request('harga');
        $produk->berat = request('berat');
        $produk->deskripsi = request('deskripsi');
        $produk->save();

        return redirect ('admin/produk')->with('success', 'Data Berhasil Diedit');
        

    }
    function destroy(Produk $produk){
        $produk->delete();

        return redirect ('admin/produk')->with('danger', 'Data Berhasil Dihapus');
        

    }

function filter(){
    $nama = request('nama');
    $stok = request('stok');
    $harga_min = request('harga_min');
    $harga_max = request('harga_max');
   $data['list_produk'] = Produk::where('nama', 'like', "%$nama%")->get();
// $data['list_produk'] = Produk::where('stok', "%$stok%")->get();
  //$data['list_produk'] = Produk::whereBettwen('harga', [$harga_min, $harga_max])->get();
 // $data['list_produk'] = Produk::where('stok', '<>', $stok)->get();
 // $data['list_produk'] = Produk::whereNotIn('stok', $stok)->get();
 // $data['list_produk'] = Produk::whereNotBetween('harga', [$harga_min, $harga_max])->get();
 // $data['list_produk'] = Produk::whereNotNull('stok')->get();
 //$data['list_produk'] = Produk::whereDate('created_at', '2020-01-20', '2020-11-09')->get();
 //$data['list_produk'] = Produk::whereBetween('harga', [$harga_min, $harga_max])->whereNotIn('stok', [750])->whereYear('created_at', '2020')->get();
   $data['nama'] = $nama;
   $data['stok'] = request('stok');
    return view('produk.index', $data);
}
    
}