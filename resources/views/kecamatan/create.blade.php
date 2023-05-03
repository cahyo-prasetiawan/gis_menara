@extends('layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

      {{ Breadcrumbs::render('kecamatan.create') }}

        <div class="row">
            <div class="col-lg-6 mb-4 order-0">
                <div class="col-xl">
                    <div class="card mb-4">
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Tambah Data Kecamatan</h5>
                      </div>
                      <div class="card-body">
                        <form action="/kecamatan" method="POST" enctype="multipart/form-data">
                            @csrf
                          <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Name</label>
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
                                value="{{ old('nama') }}"
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
                                value="{{ old('geojson') }}"
                              />
                              @error('geojson')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                            </div>
                            <div class="form-text">Hanya Format GeoJSON. Kapasistas Maksimal 40 MB</div>
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
                                value="{{ old('warna') }}"
                              />
                              @error('warna')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary">Simpan</button>
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