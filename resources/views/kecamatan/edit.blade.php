@extends('layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/dasboard">Dasboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="/kecamatan">Data Kecamatan</a>
            </li>
            <li class="breadcrumb-item active">Edit Data {{ $kecamatan->nama }}</li>
          </ol>

        <div class="row">
            <div class="col-lg-6 mb-4 order-0">
                <div class="col-xl">
                    <div class="card mb-4">
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Data Kecamatan</h5>
                      </div>
                      <div class="card-body">
                        <form action="/kecamatan/{{ $kecamatan->id }}/edit" method="POST" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            @csrf
                          <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Nama Kecamatan</label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-notepad"></i
                              ></span>
                              <input
                                type="text"
                                name="nama"
                                class="form-control @error('nama') is-invalid @enderror"
                                id="basic-icon-default-fullname"
                                placeholder="Masukkan Nama Kecamatan"
                                aria-label="Masukkan Nama Kecamatan"
                                aria-describedby="basic-icon-default-fullname2"
                                value="{{  old('nama',$kecamatan->nama ) }}"
                              />
                              @error('nama')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">File Geojson</label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-file"></i
                              ></span>
                              <input
                                type="file"
                                name="geojson"
                                class="form-control @error('geojson') is-invalid @enderror"
                                id="basic-icon-default-fullname"
                                placeholder="Masukkan geojson Kecamatan"
                                aria-label="Masukkan geojson Kecamatan"
                                aria-describedby="basic-icon-default-fullname2"
                                value="{{ old('geojson',$kecamatan->geojson) }}"
                              />
                              @error('geojson')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                            </div>
                            <div class="form-text">File : {{ $kecamatan->geojson }}</div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Warna</label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-brush"></i
                              ></span>
                              <input
                                type="color"
                                name="warna"
                                class="form-control @error('warna') is-invalid @enderror"
                                id="basic-icon-default-fullname"
                                placeholder="Masukkan Warna"
                                aria-label="Masukkan Warna"
                                aria-describedby="basic-icon-default-fullname2"
                                value="{{ old('warna',$kecamatan->warna) }}"
                              />
                              @error('warna')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                            </div>
                          </div>

                          <div class="mb-3">
                            <label for="provider" class="form-label">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" >
                              @if (old('status', $kecamatan->status)  == $kecamatan->status)
                              <option value="{{ $kecamatan->status }}" selected> @if( $kecamatan->status == '0') Aktif @else Tidak Aktif @endif</option>
                                  @if($kecamatan->status == '0')
                                  <option value="1"  {{ ($kecamatan->status == "0")? "checked" : "" }}>Tidak Aktif</option>
                                  @else
                                  <option value="0"  {{ ($kecamatan->status == "1")? "checked" : "" }}>Aktif</option>
                                  @endif
                              @else
                             
                              @endif
                            </select>
                            @error('status')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
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