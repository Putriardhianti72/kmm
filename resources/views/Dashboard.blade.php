@extends('layouts.admin')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"  />
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Dashboard</h3>

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
                <a class="btn btn-app bg-secondary" href="{{ url('User') }}">Daftar User</a>
                <a class="btn btn-app bg-success" href="{{ url('User/create') }}">Tambah User</a>
                <a class="btn btn-app bg-danger" href="{{ url('Buku') }}">Daftar Buku</a>
                <a class="btn btn-app bg-info" href="{{ url('Buku/create') }}">Tambah Buku</a>
                <p id="demo"></p>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
      <script>
        $(function() {
                // console.log(id)
  
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: 'https://sbon.herokuapp.com/listCategory',
                    success: function(response) {
                        console.log(response.data)
                        response.data.forEach(function(element) {
                          document.getElementById("demo").innerHTML +="NIM :" + element.category_id + "<br>Nama :" + element.categories + "<br>Alamat :" + element.categories + "<br><br>";
                      });
                    }
                });
        });
    </script>
    </section>
</div>
@endsection