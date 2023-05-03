@extends('layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

      {{ Breadcrumbs::render('retribusi.create') }}

        <div class="row">
            <div class="col-lg-6 mb-4 order-0">
                <div class="col-xl">
                    <div class="card mb-4">
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Tambah Data Retribusi</h5>
                       
                      </div>
                      <div class="card-body">
                        <form action="/retribusi" method="POST" enctype="multipart/form-data">
                           
                            @csrf
                            <div class="mb-3">
                                <label for="provider" class="form-label">Provider</label>
                                <select class="form-control @error('provider_id') is-invalid @enderror" id="provider_id" name="provider_id" >
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
                              <div class="mb-3">
                                <label for="provider" class="form-label">Provider</label>
                                <select class="form-control @error('provider_id') is-invalid @enderror" id="dd" name="dd" >
                                </select>
                                @error('provider_id')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                                @enderror
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
                                id="alamat"
                                class="form-control @error('alamat') is-invalid @enderror"
                                placeholder="Masukkan Alamat"
                                aria-label="Masukkan Alamat"
                                aria-describedby="basic-icon-default-company2"
                                value="{{ old('alamat') }}"
                              />
                              @error('alamat')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                            </div>
                          </div>
                        
                        
                        
                          <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- / Content -->
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
          
            <script>
                 $(document).ready(function() {
            $('#provider_id').on('change', function() {
               var provider_id = $(this).val();
               if(provider_id) {
                   $.ajax({
                       url: '/getTagihan/'+provider_id,
                       type: "GET",
                       data : {"_token":"{{ csrf_token() }}"},
                       dataType: "json",
                       success:function(data)
                       {
                         consol.log(data);
               }
            });
                 }});
        });
            //  $(document).ready(function() {
            //     $('#provider_id').on('change', function(){
            //         var kode_provider = $(this).val();
            //         // console.log(kode_provider);
            //         if (kode_provider) {
            //             $.ajax({
            //                 url:'/retribusi/' + kode_provider,
            //                 type: 'GET',
            //                 data: {
            //                     '_token': '{{ csrf_token() }}'
            //                 },
            //                 dataType: 'json',
            //                 success: function(data){
            //                    console.log(data);
            //                 }
            //             });
            //         } else{

            //         }
            //     });
            //  });
            </script>
      @endsection