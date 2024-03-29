@extends('layouts.main')

@section('content')
   <div class="container-xxl flex-grow-1 container-p-y">
   
      {{ Breadcrumbs::render('menara') }}
      
       <div class="row">
           <div class="col-lg-12 mb-4 order-0">
<!-- Hoverable Table rows -->
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show text-dark" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session()->has('LoginError'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ session('LoginError') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="card">
   <h5 class="card-header">Data menara</h5>
   <div class="table-responsive text-nowrap">
  <div class="d-flex align-items-center justify-content-between">
    <div class="col-md-8">
      <a href="menara/create" class="btn btn-primary ms-3 mb-2">Tambah data</a>
      <a href="#" class="btn btn-primary ms-3 mb-2" data-bs-toggle="modal" data-bs-target="#smallModal" >Cetak</a>
    </div>
    <!-- Modal -->
    <form method="GET" action="/menara">
           <div class="md-3 input-group col-3 input-group-merge ">
             <span class="input-group-text border-0 shadow-none" id="basic-addon-search31"><i class="bx bx-search"></i></span>
             <input
               type="text"
               name="search"
               class="form-control border-0 shadow-none"
               placeholder="Cari Sesuatu..."
               aria-label="Cari Sesuatu..."
               value="{{ request('search') }}"
               aria-describedby="basic-addon-search31"
             />
           </div>   
    </form> 
  </div>
     <table class="table table-hover">
       <thead>
         <tr>
           <th>#</th>
           <th>Foto</th>
           <th>Site Name</th>
           <th>Provider</th>
           <th>Kecamatan</th>
           <th>Alamat</th>
           <th>Tinggi</th>
           <th>Jenis Menara</th>
           <th>Tahun</th>
           <th>Latitude</th>
           <th>Longitute</th>
           <th>Aksi</th>
         </tr>
       </thead>
       <tbody class="table-border-bottom-0">
        @if(count($menaras)>0)
           @foreach ($menaras as $menara)
         <tr>
          <input type="hidden" class="delete_id" value="{{ $menara->id }}">
           <td>{{ $loop->iteration }}</td>
           <td>@if($menara->foto == "")
              none
            @else
            <img src="{{ asset('storage/'.$menara->foto) }}" class="w-px-40 h-auto "  alt=""> </td>
            @endif
            <td>{{ $menara->nama }}</td>
           <td>{{ $menara->provider->name }}</td>
           <td>{{ $menara->kecamatan->nama }}</td>
           <td>{{ $menara->alamat }}</td>
           <td>{{ $menara->tinggi }} M</td>
           <td> {{ $menara->Jenis->nama }} Kaki</td>
           <td>{{ $menara->tahun }}</td>
           <td>{{ $menara->lat }}</td>
           <td>{{ $menara->long }}</td>
          
           <td>
             <div class="dropdown">
               <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                 <i class="bx bx-dots-vertical-rounded"></i>
               </button>
               <div class="dropdown-menu">
                 <a  class="dropdown-item editbtn" href="/menara/{{ $menara->nama }}/edit"
                   ><i class="bx bx-edit-alt me-1"></i> Edit</a
                 >
                 <a  class="dropdown-item editbtn" href="/menara/{{ $menara->nama }}"
                  ><i class="bx bx-eye me-1"></i> Detail</a
                >

                 <form action="menara/{{ $menara->id }}" method="post" >
                   @method('delete')
                   @csrf
                 <button class="dropdown-item btndelete" 
                   ><i class="bx bx-trash me-1"></i> Delete</button>
                 </form>
                 
               </div>
             </div>
           </td>
           @endforeach
           @else
           <td colspan="10">
            <h5 class="text-center">Tidak ada data</h5>
           </td>
          @endif
         </tr>
       </tbody>
     </table>
     <div class="container mt-2">
      {{ $menaras->links('pagination::bootstrap-5') }}
    </div>
   </div>
 </div>
</div>
</div>
</div>

<div class="modal fade" id="smallModal" tabindex="-1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Cetak Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="/menaraCetak" method="get">
      <div class="modal-body">
        <div class="col-12 mb-3">
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
        <div class="col-12 text-center">
        <label for="provider" class="form-label">atau</label>
        </div>
        <div class="col-12 mb-3">
          <label for="provider" class="form-label">Kecamatan</label>
          <select class="form-control @error('kecamatan_id') is-invalid @enderror" id="kecamatan_id" name="kecamatan_id" >
            <option value="">== Pilih Kecamatan ==</option>
          @foreach ($kecamatans as $kecamatan)
          @if (old('kecamatan_id') == $kecamatan->id)
          <option value="{{ $kecamatan->id }}" selected>{{ $kecamatan->nama}}</option>
          @else
          <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama}}</option>
          @endif
           @endforeach
        </select>
        @error('kecamatan_id')
        <div class="invalid-feedback">
        {{ $message }}
        </div>
        @enderror
        </div>

       
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
          Keluar
        </button>
        <button type="submit" target="blank" class="btn btn-primary">Cetak</button>
      </div>
      </form>

    </div>
  </div>
</div>
 <!--/ Hoverable Table rows -->
   {{-- @include('pegawai.create')
   @include('pegawai.edit') --}}
   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
          
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.btndelete').click(function (e) {
            e.preventDefault();

            var deleteid = $(this).closest("tr").find('.delete_id').val();

            swal({
                    title: "Apakah anda yakin?",
                    text: "Setelah dihapus, Anda tidak dapat memulihkan data ini lagi!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        var data = {
                            "_token": $('input[name=_token]').val(),
                            'id': deleteid,
                        };
                        $.ajax({
                            type: "DELETE",
                            url: 'menara/' + deleteid,
                            data: data,
                            success: function (response) {
                                swal(response.status, {
                                        icon: "success",
                                    })
                                    .then((result) => {
                                        location.reload();
                                    });
                            }
                        });
                    }
                });
        });

      
    });

</script>

 @endsection