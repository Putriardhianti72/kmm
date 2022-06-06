<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Models\Genre;
use Illuminate\Support\Facades\File;

class ApiBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::all();
        $datas = Buku::all();
        return compact('datas','genres');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $model = new Buku;

        $model->genre_id = $request->genre_id;
        $model->name = $request->name;
        $model->pengarang = $request->pengarang;
        $model->price = $request->price;
        $model->produk_terbit = $request->produk_terbit;

        if($request->file('produk_image')){
            $file = $request->file('produk_image');
            $nama_file = time().str_replace(" ","",$file->getClientOriginalName()); 
            $file->move('foto', $nama_file);
            $model->produk_image = $nama_file;
        }
        $model->save();

        return "Data Berhasil Masuk";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $genre_id = $request->genre_id;
        $name = $request->name;
        $pengarang = $request->pengarang;
        $price = $request->price;
        $produk_terbit = $request->produk_terbit;
        $produk_image = $request->produk_image;

        $model = Buku::find($id);
        $model->genre_id = $genre_id;
        $model->name = $name;
        $model->pengarang = $pengarang;
        $model->price = $price;
        $model->produk_terbit = $produk_terbit;
        
        if($produk_image->file('produk_image')){
            $file = $request->file('produk_image');
            $nama_file = time().str_replace(" ","",$file->getClientOriginalName()); 
            $file->move('foto', $nama_file);
            File::delete('foto', $model->produk_image);
            $model->produk_image = $nama_file;
        }
        $model->save();
        return  "Data Berhasil di Update";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();

        return "Data Berhasil di Hapus";
    }
}
