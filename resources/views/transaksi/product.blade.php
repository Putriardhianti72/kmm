@extends('layouts.admin')
@section('content')    
<div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Product</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                            <div class="row">
                                @foreach ($produk as $product)
                                    <div class="col-md-3 mb-3">
                                        <div class="card">
                                            <div class="card-head">
                                                <h6 class="text-center">{{ $product->name}}</h6>
                                            </div>
                                            <div class="card-body">
                                                <img class="img" height="200" alt="produk_image" src="{{ asset('foto/'.$product->produk_image) }}">
                                            </div>
                                            <div class="card-footer">
                                                <h6 class="text-center">Harga: {{ $product->price}}</h6>
                                                <h6 class="text-center">Penulis: {{ $product->pengarang}}</h6>
                                                <a href="{{ url('/cart/tambah/'.$product->id) }}" class="btn btn-primary btn-sm btn-block">Add To Cart</a>
                                            </div>
                                        </div>
                                    </div>    
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>
@endsection