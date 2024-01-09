@extends('layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/dasboard">Dasboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="/retribusi">Data Retribusi</a>
        </li>
        <li class="breadcrumb-item active">Edit Data</li>
      </ol>

        <div class="row">
            <div class="col-lg-6 mb-4 order-0">
                <div class="col-xl">
                    <div class="card mb-4">
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Data Retribusi</h5>
                       
                      </div>
                      <div class="card-body">
                        <form action="/retribusi/{{ $retribusi->id }}/edit" method="POST" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            @csrf
                            <div class="mb-3">
                                <label for="provider" class="form-label">Provider</label>
                                <select   disabled class="form-control @error('provider_id') is-invalid @enderror" id="provider_id" name="provider_id" >
                                  
                                  @foreach ($providers as $provider)
                                  @if (old('provider', $retribusi->provider_id) == $provider->id)
                                  <option value="{{ $provider->id }}" selected>{{ $provider->name}}</option>
                                  @else
                                  @endif
                                   @endforeach
                                </select>
                                @error('provider_id')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                                @enderror
                              </div>
                          <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Tagihan</label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-company2" class="input-group-text"
                                >Rp.</span>
                                <input
                                type="text"
                                name="tagihan"
                                disabled
                                class="form-control @error('tagihan') is-invalid @enderror"
                                id="basic-icon-default-fullname"
                                placeholder="Masukkan Nama Perusahaan"
                                aria-label="Masukkan Nama Perusahaan"
                                aria-describedby="basic-icon-default-fullname2"
                                value="{{ old('tagihan',  $retribusi->tagihan) }}"
                              />
                              @error('tagihan')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                            </div>
                          </div>
                          <div class="mb-3 ">
                            <label class="form-label" for="basic-icon-default-fullname">Jatuh Tempo</label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-date"></i
                              ></span>
                              <input
                                type="datetime-local"
                                name="jatuh_tempo"
                                class="form-control @error('jatuh_tempo') is-invalid @enderror"
                                id="basic-icon-default-fullname"
                                placeholder="Masukkan Nama Perusahaan"
                                aria-label="Masukkan Nama Perusahaan"
                                aria-describedby="basic-icon-default-fullname2"
                                value="{{ old('jatuh_tempo',  $retribusi->jatuh_tempo) }}"
                              />
                              @error('jatuh_tempo')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                            </div>
                          </div>
                          
                          <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="1" name="status" id="defaultCheck3" >
                            <label class="form-check-label" for="defaultCheck3"> Sudah Bayar </label>
                          </div>
                        
                        
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              
              <!-- / Content -->
                      </div>
                    </div>
                  
                  <!-- / Content -->

            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
          
            <script>


             $(document).ready(function() {
                $('#provider_id').on('change', function(){
                    var kode_provider = $(this).val();
                    // console.log(kode_provider);
                    if (kode_provider) {
                        $.ajax({
                            url:'/tagihan/' + $retribusi->provider_id,
                            type: 'GET',
                            data: {
                                '_token': '{{ csrf_token() }}'
                            },
                            dataType: 'json',
                            success: function(data){
                               if (data) {
                                // console.log(data);
                                $('#menara_id').empty();
                                $('#menara_id').append('<option value="">==Pilih==</option>');
                                $.each(data,function(nama,kode){
                    $("#menara_id").append('<option value="'+kode.id+'">'+kode.nama+'</option>');
                });
                               } else {
                                
                               }
                            }
                        });
                    } else{

                    }
                    });
                });

                
             $(document).ready(function() {
                $('#menara_id').on('change', function(){
                
                    var tagihan = $(this).val();
                    console.log(tagihan);
                    if (tagihan) {
                        $.ajax({
                            url:'/tarif/' +  $retribusi->menara_id,
                            type: 'GET',
                            data: {
                                '_token': '{{ csrf_token() }}'
                            },
                            dataType: 'json',
                            success: function(data){
                               if (data) {
                                // console.log(data);
                                $('#tagihan').empty();
                                $.each(data,function(nama,kode){
                    $("#tagihan").append('<option value="'+kode.tarif+'">'+kode.tarif+'</option>');
                });
                               } else {
                                
                               }
                            }
                        });
                    } else{

                    }

                    
                });
            });
            </script>
      @endsection