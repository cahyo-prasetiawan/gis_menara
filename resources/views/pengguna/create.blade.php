@extends('layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
      
      {{ Breadcrumbs::render('pengguna.create') }}

        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="col-xl">
                    <div class="card mb-4">
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Tambah Data Pengguna</h5>
                      </div>
                      <div class="card-body">
                        <form action="/pengguna" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-2">
                            <div class="mb-3">
                              <label class="form-label" for="basic-icon-default-company">Foto</label>
                                <img class="img-preview img-fluid mb-3 col-sm-1" >
                              <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-image-alt"></i
                              ></span>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image"  accept="image/png, image/jpeg" onchange="previewImage()">                    
                                @error('image')
                              <div class="invalid-feedback">
                              {{ $message }}
                              </div>
                              @enderror
                              </div>
                              <div class="form-text">Hanya Format JPG, GIF Atau PNG. Kapasistas Maksimal 800Kb</div>
                            </div>
                            <div class="mb-3  col-md-6">
                              <label for="provider" class="form-label">Provider</label>
                              <select class="form-control @error('provider_id') is-invalid @enderror" name="provider_id" >
                                  <option value="">== Pilih Provider ==</option>
                                @foreach ($providers as $provider)
                                @if (old('provider_id') == $provider->id)
                                <option value="{{ $provider->id }}" selected>{{ $provider->name}}</option>
                                @else
                                <option value="{{ $provider->id }}">{{ $provider->name}}</option>
                                @endif
                                 @endforeach
                              </select>
                              @error('provider_id')
                              <div class="invalid-feedback">
                              {{ $message }}
                              </div>
                              @enderror
                            </div>
                          <div class="mb-3  col-md-6">
                            <label class="form-label" for="basic-icon-default-fullname">Nama</label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-user"></i
                              ></span>
                              <input
                                type="text"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                id="basic-icon-default-fullname"
                                placeholder="Masukkan Nama Lengkap"
                                aria-label="Masukkan Nama Lengkap"
                                aria-describedby="basic-icon-default-fullname2"
                                value="{{ old('name') }}"
                              />
                              @error('name')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                            </div>
                          </div>
                          <div class="mb-3  col-md-6">
                            <label class="form-label" for="basic-icon-default-fullname">No HP</label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-phone"></i
                              ></span>
                              <input
                                type="number"
                                name="no_hp"
                                class="form-control @error('no_hp') is-invalid @enderror"
                                id="basic-icon-default-fullname"
                                placeholder="Masukkan No HP"
                                aria-label="Masukkan No HP"
                                aria-describedby="basic-icon-default-fullname2"
                                min="0"
                                maxlength="12"
                                value="{{ old('no_hp') }}"
                              />
                              @error('no_hp')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                            </div>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="basic-icon-default-company">Username</label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-company2" class="input-group-text"
                                ><i class="bx bx-buildings"></i
                              ></span>
                              <input
                                type="text"
                                name="username"
                                id="basic-icon-default-company"
                                class="form-control @error('username') is-invalid @enderror"
                                placeholder="Masukkan Username"
                                aria-label="Masukkan Username"
                                aria-describedby="basic-icon-default-company2"
                                value="{{ old('username') }}"
                              />
                              @error('username')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                            </div>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="basic-icon-default-email">Email</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                              <input
                                type="text"
                                id="basic-icon-default-email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email"
                                placeholder="Masukkan Email"
                                aria-label="Masukkan Email"
                                aria-describedby="basic-icon-default-email2"
                                value="{{ old('email') }}"
                              />
                              <span id="basic-icon-default-email2" class="input-group-text">@gmail.com</span>
                              @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                            </div>
                            <div class="form-text">Anda bisa menggunakan huruf, angka & periods</div>
                          </div>
                          <div class="mb-3 col-md-6 form-password-toggle">
                            <div class="d-flex justify-content-between">
                              <label class="form-label" for="password">Password</label>
                            </div>
                            <div class="input-group input-group-merge">
                              <input
                                type="password"
                                id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password"
                              />
                              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                              @error('password')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- / Content -->
            </div>

            <script>
              function previewImage()
             {
             const image = document.querySelector('#image');
             const imgPreview = document.querySelector('.img-preview');

             imgPreview.style.display = 'block';

             const oFReader = new FileReader();
             oFReader.readAsDataURL(image.files[0]);

             oFReader.onload = function(oFREvent) {
               imgPreview.src = oFREvent.target.result;
             }
             }
           </script>
      @endsection