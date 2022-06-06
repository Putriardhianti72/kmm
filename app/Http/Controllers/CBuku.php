<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Http\Requests\BukuRequest;
use App\Models\Genre;
use Illuminate\Support\Facades\File;

class CBuku extends Controller
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
        return view('buku.index', compact('datas','genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        $model = new Buku;
        return view('buku.create', compact('model','genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BukuRequest $request)
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

        return redirect('Buku')->with('success', "Data Buku berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Buku::find($id);
        $genres = Genre::all();
        return view('buku.edit', compact('model','genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BukuRequest $request, $id)
    {
        $model = Buku::find($id);
        
        $model->genre_id = $request->genre_id;
        $model->name = $request->name;
        $model->pengarang = $request->pengarang;
        $model->price = $request->price;
        $model->produk_terbit = $request->produk_terbit;
        
        if($request->file('produk_image')){
            $file = $request->file('produk_image');
            $nama_file = time().str_replace(" ","",$file->getClientOriginalName()); 
            $file->move('foto', $nama_file);
            File::delete('foto', $model->produk_image);
            $model->produk_image = $nama_file;
        }
        $model->save();

        return redirect('Buku')->with('success', "Data berhasil diedit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Buku::find($id);
        $model->delete();
       
        return redirect('Buku');

    }
}
