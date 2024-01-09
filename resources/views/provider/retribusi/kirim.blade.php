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
        <li class="breadcrumb-item active">Kirim Tagihan</li>
      </ol>


        <div class="row">
            <div class="col-lg-6 mb-4 order-0">
                <div class="col-xl">
                    <div class="card mb-4">
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Kirim Tagihan Retribusi</h5>
                       
                      </div>
                      <div class="card-body">
                        <form action="/kirimEmail" method="POST" enctype="multipart/form-data">
                           {{ csrf_field() }}
                            @csrf
                            <div class="row g-2">
                            <div class="mb-3">
                                <label for="provider" class="form-label">Provider</label>
                                <select class="form-control @error('provider_id') is-invalid @enderror" id="provider_id" name="provider_id" >
                                    <option value="">== Pilih Provider ==</option>
                                  @foreach ($providers as $provider)
                                  @if (old('provider') == $provider->id)
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
                              <div class="col mb-0">
                                <label for="provider" class="form-label">Email</label>
                                <select class="form-control @error('email') is-invalid @enderror" id="email" name="email" >
                                </select>
                                @error('email')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                                @enderror
                              </div>
                              
                             
                             
                          <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">tagihan</label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-company2" class="input-group-text"
                                >Rp.</span>
                              <select class="form-control @error('tagihan') is-invalid @enderror" id="tagihan" name="tagihan" >
                            </select>
                              @error('tagihan')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                            </div>
                          </div>
                                 
                          <div class="mb-3">
                            <label for="invoice-subject" class="form-label">Subject</label>
                            <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" id="invoice-subject" placeholder="Masukkan Kalimat Subject" />
                            @error('subject')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                          </div>

                          <div class="mb-3 ">
                            <label class="form-label" for="basic-icon-default-fullname">Pesan</label>
                            <div class="input-group input-group-merge">
                              
                              <textarea name="pesan" class="form-control" id="" cols="3" rows="3"></textarea>
                              @error('pesan')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                            </div>
                          </div>
                            </div>
                        <div class="mb-3">
                            <label for="invoice-subject" class="form-label">File</label>
                            <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" id="invoice-file" placeholder="Masukkan Kalimat file" />
                            @error('file')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
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
                  
                    if (kode_provider) {
                        $.ajax({
                            url:'/email/' + kode_provider,
                            type: 'GET',
                            data: {
                                '_token': '{{ csrf_token() }}'
                            },
                            dataType: 'json',
                            success: function(data){
                               if (data) {
                                // console.log(data);
                                $('#email').empty();
                              
                                $.each(data,function(nama,kode){
                    $("#email").append('<option value="'+kode.email+'">'+kode.email+'</option>');
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
                $('#provider_id').on('change', function(){
                    var kode_provider = $(this).val();
                   
                  console.log(kode_provider);
                    if (kode_provider) {
                        $.ajax({
                            url:'/total/' + kode_provider,
                            type: 'GET',
                            data: {
                                '_token': '{{ csrf_token() }}'
                            },
                            dataType: 'json',
                            success: function(data){
                               if (data) {
                                console.log(data);
                                $('#tagihan').empty();
                                $('#tagihan').append('<option value="'+data+'">'+data+'</option>');
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