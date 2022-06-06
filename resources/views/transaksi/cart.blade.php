@extends('layouts.admin')
@section('content')    
<div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
      <div class="col-sm-6">
          <a class="btn btn-info" href="{{ url('/Product') }}">Beli Lagi</a>
      </div>
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
              <table class="table table-sm table-bordered table-hovered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Judul</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Sub Total</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no=1;
                                    $grandtotal=0;
                                ?>
                        @if (empty($cart)||count($cart)==0)
                            <td colspan="5"><h6 class="text-center">Empty Cart</h6></td>
                        @else
                                @foreach ($cart as $ct => $val)
                                <?php
                                    $subtotal=$val["price"]*$val["jumlah"];
                                ?>
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $val["name"] }}</td>
                                            <td>{{ $val["price"] }}</td>
                                            <td>{{ $val["jumlah"] }}</td>
                                            <td>{{ $subtotal }}</td>
                                            <td><a href="{{ url('/cart/hapus/'.$ct) }}" class="btn btn-primary btn-sm btn-block">Cancel</a></td>
                                        </tr>
                                        <?php 
                                            $grandtotal+=$subtotal;
                                        ?>
                                    @endforeach
                                </tbody>
                                <tr>
                                    <th colspan="4"> Grand Total</th>
                                    <th>{{ $grandtotal }}</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <tr>
                                    <th colspan="6"> 
                                    <a href="{{ url('/transaksi/tambah') }}" class="btn btn-primary btn-sm btn-block">Beli</a>
                                    </th>
                                </tr>
                            </table>
                            @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection