@extends('layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

      {{ Breadcrumbs::render('jenis.create') }}

        <div class="row">
            <div class="col-lg-6 mb-4 order-0">
                <div class="col-xl">
                    <div class="card mb-4">
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Tambah Data Jenis Menara</h5>
                      </div>
                      <div class="card-body">
                        <form action="/jenis/{{ $biaya->id }}/edit" method="POST" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            @csrf
                          <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Jenis Menara</label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-ruler"></i
                              ></span>
                              <input
                                type="number"
                                name="nama"
                                class="form-control @error('nama') is-invalid @enderror"
                                id="basic-icon-default-fullname"
                                placeholder="Masukkan Nama Jenis"
                                aria-label="Masukkan Nama Jenis"
                                aria-describedby="basic-icon-default-fullname2"
                                value="{{ old('nama', $biaya->nama) }}"
                                min="1"
                                max="4"
                              />
                              <span id="basic-icon-default-email2" class="input-group-text">Kaki</span>
                              @error('jenis')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                            </div>
                            <div class="form-text">Jenis menara yang tersedia 1 kaki, 3 kaki dan 4 kaki</div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Tarif</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">Rp.</span>
                              <input
                                type="number"
                                name="tarif"
                                class="form-control @error('tarif') is-invalid @enderror"
                                id="basic-icon-default-fullname"
                                placeholder="Masukkan Tarif"
                                aria-label="Masukkan Tarif"
                                aria-describedby="basic-icon-default-fullname2"
                                value="{{ old('tarif', $biaya->tarif) }}"
                                min="1"
                                maxlength="20"
                              />
                              <span class="input-group-text">.00</span>
                              @error('tarif')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                            </div>
                            <div class="form-text">Contoh : 2.000.000</div>
                          </div>
                         
                          <button type="submit" class="btn btn-primary">Kirim</button>
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