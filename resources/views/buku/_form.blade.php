                      <div class="form-group">
                        <label>Genre</label>
                        <select name="genre_id" class="form-control" value="{{ $model->genre }}">
                        <option>- Pilih -</option>
                          @foreach ($genres as $jenis)
                          <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                          @endforeach
                        </select>
                        @foreach ($errors -> get('genre_id') as $msg)
                        <p class="text-danger">{{ $msg }}</p>
                        @endforeach
                      </div>
                  <div class="form-group">
                    <label for="judul">Judul Buku</label>
                    <input type="text" name="name" value="{{ $model->name }}" class="form-control" id="judul" placeholder="">
                    @foreach ($errors -> get('name') as $msg)
                        <p class="text-danger">{{ $msg }}</p>
                    @endforeach
                  </div>
                  <div class="form-group">
                    <label for="pengarang">Nama Pengarang</label>
                    <input type="text" name="pengarang" value="{{ $model->pengarang }}" class="form-control" id="pengarang" placeholder="">
                    @foreach ($errors -> get('pengarang') as $msg)
                        <p class="text-danger">{{ $msg }}</p>
                    @endforeach
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga Buku</label>
                    <input type="text" name="price" value="{{ $model->price }}" class="form-control" id="harga" placeholder="">
                    @foreach ($errors -> get('price') as $msg)
                        <p class="text-danger">{{ $msg }}</p>
                    @endforeach
                  </div>
                  <div class="form-group">
                    <label for="tahun_terbit">Tahun Terbit</label>
                    <input type="text" name="produk_terbit" value="{{ $model->produk_terbit }}" class="form-control" id="tahun_terbit" placeholder="">
                    @foreach ($errors -> get('produk_terbit') as $msg)
                        <p class="text-danger">{{ $msg }}</p>
                    @endforeach
                  </div>
                  <div class="form-group">
                    <label>File input</label>
                      <div class="custom-file">
                        <input type="file" name="produk_image" class="custom-file-input">
                        <label class="custom-file-label">Choose file</label>
                      </div>
                      @foreach ($errors -> get('produk_image') as $msg)
                        <p class="text-danger">{{ $msg }}</p>
                        @endforeach
                        @if (strlen($model-> produk_image)>0)
                            <img src="{{ asset('foto/'.$model->produk_image) }}" />
                        @endif
                    </div>
                  
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>