@extends('layouts.main')

@section('content')
   <div class="container-xxl flex-grow-1 container-p-y">
   
      {{ Breadcrumbs::render('retribusi') }}
      
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
   <h5 class="card-header">Data 2 Retribusi</h5>
   <div class="table-responsive text-nowrap">
    <div class="row">
             <div class="col-md-6">
              <a href="retribusi/create" class="btn btn-primary ms-3 mb-2">Tambah data</a>
              <a href="/kirimTagihan" class="btn btn-primary ms-3 mb-2">Kirim data</a>
              <button type="button" class="btn btn-primary ms-3 mb-2" data-bs-toggle="modal" data-bs-target="#smallModal">Kirim Tagihan</button>
             </div>
             <div class="col-md-6">
              <form action="/retribusi" method="get">
              <div class="row">
                <div class="col">
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
                <div class="col">
                  <select class="form-control @error('tahun') is-invalid @enderror" name="tahun">
                    <option value="">== Pilih Tahun ==</option>
                    <?php $years = range(2021, strftime("%Y", time())); ?>
                   @foreach($years as $year)
                     @if (old('tahun') == $year)
                       <option value="{{ $year }}" selected>{{  $year }}</option>
                     @else
                       <option value="{{ $year }}" >{{ $year }}</option>
                    @endif
                   @endforeach
                </select>
                @error('tahun')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
                @enderror
                </div>
                <div class="col">
                  <button type="submit"  class="btn btn-primary ms-3 mb-2">Filter</button>
                </div>
              </div>
              </form>
            </div>  
    </div>    
     <table class="table table-hover" id="myTable">
       <thead>
        <?php
        function rupiah($angka)
    {
        // $prefix = $prefix ? $prefix : 'Rp. ';
        // $nominal = $this->attributes[$field];
        // return $prefix . number_format($nominal, 0, ',', '.');
        $hasil = "Rp. " . number_format($angka, '2', ',' , '.');
        return $hasil;
    }
    ?>
         <tr>
           <th>#</th>
           <th>Nama Provider</th>
           <th>Nama Menara</th>
           <th>Tagihan</th>
           <th>Jatuh Tempo</th>
           <th>Status</th>
           <th>Aksi</th>
         </tr>
       </thead>
       <tbody class="table-border-bottom-0">
        @if(count($retribusis)>0)
           @foreach ($retribusis as $retribusi)
         <tr>
          <input type="hidden" class="delete_id" value="{{ $retribusi->id}}">
           <td>{{ $loop->iteration }}</td>
           <td>{{ $retribusi->name }}</td>
           <td>{{ $retribusi->nama }}</td>
           <td>{{ rupiah($retribusi->tagihan) }}</td> 
           {{-- <td>{{ $retribusi->jatuh_tempo-> }}</td>  --}}
           <td>{{ Carbon\Carbon::parse($retribusi->jatuh_tempo)->diffForHumans()}}</td>
           <td> <span class="badge rounded-pill bg-danger">Belum Bayar</span></td>
           <td>
             <div class="dropdown">
               <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                 <i class="bx bx-dots-vertical-rounded"></i>
               </button>
               <div class="dropdown-menu">
                 <a  class="dropdown-item editbtn" href="/retribusi/{{ $retribusi->tagihan}}/edit"
                   ><i class="bx bx-edit-alt me-1"></i> Edit</a
                 >
                 <form action="/retribusi/{{ $retribusi->id}}" method="post" >
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
            <td colspan="5">
             <h5 class="text-center">Tidak ada data</h5>
            </td>
           @endif
         </tr>
       </tbody>
       <tbody class="table-border-bottom-0">
       <tr>
        <td colspan="3" class="text-end">Total Tagihan : </td>
        <td  >Rp. {{ $total }}</td>
       </tr>
       </tbody>
     </table>
   </div>
 </div>
</div>
</div>
</div>


 <!--/ Hoverable Table rows -->
   {{-- @include('pegawai.create')
   @include('pegawai.edit') --}}
   @include('provider.retribusi.kirim')
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
                            url: '/retribusi/' + deleteid,
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