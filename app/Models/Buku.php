<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = "tabel_produks";

    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    static function list_produk(){
        $data = Buku::all();
        return $data;
    }

    static function tambah_produk($name,$price){
        Buku::create([
            "name"=>$name,
            "price"=>$price
        ]);
    }

    static function detail_produk($id){
        $data=Buku::where("id", $id)->first();
        return $data;
    }
}
