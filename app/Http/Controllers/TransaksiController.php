<?php

namespace App\Http\Controllers;

use App\Models\Buku as Produk;
use App\Models\Detail_transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    function index(){
        $produk=Produk::list_produk();
        return view("transaksi.product")->with("produk",$produk);
    }

    function do_tambah_cart($id){
        $cart=session("cart");
        $produk=Produk::detail_produk($id);

        

        if(!isset($cart[$id])) {
            $cart[$id]=[
                "name"=>$produk->name,
                "price"=>$produk->price,
                "jumlah"=>1
            ];
        }else{
            $cart[$id]["jumlah"]++;
        }

        session(["cart"=>$cart]);
        return redirect("/cart");
    }

    function cart(){
        $cart=session("cart");
        return view("transaksi.cart")->with("cart",$cart);
    }

    function do_hapus_cart($id){
        $cart=session("cart");

        if($cart[$id]["jumlah"]==1){
            unset($cart[$id]);
        }else{
            $cart[$id]["jumlah"]--;
        }
        session(["cart"=>$cart]);
        return redirect("/cart");
    }

    function do_tambah_transaksi(){
        $cart=session("cart");

        foreach($cart as $ct =>$val){
            $id_produk = $ct;
            $jumlah=$val["jumlah"];
            Detail_transaksi::tambah_detail_transaksi($id_produk,$jumlah);
        }

        session()->forget("cart");
        return redirect("/cart");
    }
}
