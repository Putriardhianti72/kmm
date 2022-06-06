@extends('layouts.admin')
@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Buku</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/Dashboard">Home</a></li>
              <li class="breadcrumb-item active">Daftar Buku</li>
            </ol>
          </div>
          <div class="col-sm-6">
          <a class="btn btn-info" href="{{ url('Buku/create') }}">Tambah Buku</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @if (Session::has('success'))
            <p class="alert alert-success">{{ Session::get('success') }}</p>
          @endif

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- <div class="row"> -->
          <!-- left column -->
          <!-- <div class="col-md"> -->
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Input Data Buku</h3>
              </div>

                <table class="table-bordered table">
                    <tr>
                        <th>ID</th>
                        <th>Genre</th>
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Harga</th>
                        <th>Terbit</th>
                        <th>Image</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                    @foreach ($datas as $value)
                    <tr>    
                        <td>{{ $value-> id}}</td>
                        <td>{{ $value->genre->nama}}</td>
                        <td>{{ $value-> name}}</td>
                        <td>{{ $value-> pengarang}}</td>
                        <td>{{ $value-> price}}</td>
                        <td>{{ $value-> produk_terbit}}</td>
                        <td>@if (strlen($value-> produk_image)>0)
                            <img height="200px" src="{{ asset('foto/'.$value->produk_image) }}" />
                            @endif
                        </td>
                        <td><a class="btn btn-info" href="{{ url('Buku/'.$value->id.'/edit') }}">Update</a></td>
                        <td>
                            <form action="{{ url('Buku/'.$value->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" type="submit">DELETE</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
      </div>
    </section>
@endsection