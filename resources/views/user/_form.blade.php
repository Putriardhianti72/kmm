                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="name" value="{{ $model2->name }}" class="form-control" id="nama" placeholder="">
                    @foreach ($errors -> get('name') as $msg)
                        <p class="text-danger">{{ $msg }}</p>
                    @endforeach
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ $model2->email }}" class="form-control" id="email" placeholder="">
                    @foreach ($errors -> get('email') as $msg)
                        <p class="text-danger">{{ $msg }}</p>
                    @endforeach
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="">
                    @foreach ($errors -> get('password') as $msg)
                        <p class="text-danger">{{ $msg }}</p>
                    @endforeach
                  </div>

                  <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  </div>