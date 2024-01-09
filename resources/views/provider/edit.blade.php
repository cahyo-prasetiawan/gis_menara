@extends('layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/dasboard">Dasboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="/provider">Data Proveider</a>
        </li>
        <li class="breadcrumb-item active">Edit Data {{ $provider->name }}</li>
      </ol>

        <div class="row">
            <div class="col-lg-6 mb-4 order-0">
                <div class="col-xl">
                    <div class="card mb-4">
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Basic with Icons</h5>
                        <small class="text-muted float-end">Merged input group</small>
                      </div>
                      <div class="card-body">
                        <form action="/provider/{{ $provider->name }}" method="POST" enctype="multipart/form-data">
                          @method('put')
                            @csrf
                          <div class="mb-3">
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
                                placeholder="Masukkan Nama Perusahaan"
                                aria-label="Masukkan Nama Perusahaan"
                                aria-describedby="basic-icon-default-fullname2"
                                value="{{ old('name', $provider->name) }}"
                              />
                              @error('name')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Alamat</label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-company2" class="input-group-text"
                                ><i class="bx bx-buildings"></i
                              ></span>
                              <input
                                type="text"
                                name="alamat"
                                id="basic-icon-default-company"
                                class="form-control @error('alamat') is-invalid @enderror"
                                placeholder="Masukkan Alamat"
                                aria-label="Masukkan Alamat"
                                aria-describedby="basic-icon-default-company2"
                                value="{{ old('alamat', $provider->alamat) }}"
                              />
                              @error('alamat')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                            </div>
                          </div>

                          <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Icon</label>
                            @if ($provider->icon)
                            <img src="{{ asset('storage/'.$provider->icon) }}" class="img-preview img-fluid mb-3 col-sm-3 d-block" > 
                            @else
                            <img class="img-preview img-fluid mb-3 col-sm-5" >   
                            @endif
                            <div class="input-group input-group-merge">
                              <input type="file" class="form-control @error('icon') is-invalid @enderror" id="icon" name="icon" onchange="previewImage()">                    
                              @error('icon')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                            </div>
                            <div class="form-text">Hanya Format JPG, GIF Atau PNG. Kapasistas Maksimal 800Kb</div>
                          </div>
                        
                          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
             const icon = document.querySelector('#icon');
             const imgPreview = document.querySelector('.img-preview');

             imgPreview.style.display = 'block';

             const oFReader = new FileReader();
             oFReader.readAsDataURL(icon.files[0]);

             oFReader.onload = function(oFREvent) {
               imgPreview.src = oFREvent.target.result;
             }
             }
           </script>
      @endsection