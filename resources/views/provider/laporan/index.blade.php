@extends('layouts.main')

@section('content')

<style>
  
</style>
   <div class="container-xxl flex-grow-1 container-p-y">
   
    {{ Breadcrumbs::render('laporan') }}
      
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
  <h5 class="card-header">Data Laporan</h5>
  <div class="table-responsive text-nowrap">
   <div class="row">
            <div class="col-md-8">
             <a href="#" class="btn btn-primary ms-3 mb-2" data-bs-toggle="modal" data-bs-target="#smallModal" >Cetak</a>
           </div>
            <div class="col-md-4">
             <form action="/laporan" method="get">
             <div class="row">
               <div class="col-7">
                 <select class="form-control @error('tahun') is-invalid @enderror" name="tahun">
                   <option value="">== Pilih Tahun ==</option>
                  
                  @foreach($tahun as $year)
                    @if (old('tahun', request('tahun')) == $year)
                      <option value="{{ $year->year }}" selected>{{  $year->year }}</option>
                    @else
                      <option value="{{ $year->year }}" >{{ $year->year }}</option>
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
          <th>Tagihan</th>
          <th>Tanggal Bayar</th>
          <th>Tahun</th>
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
          <td>{{ rupiah($retribusi->tagihan) }}</td> 
          {{-- <td>{{ $retribusi->jatuh_tempo-> }}</td>  --}}
          <td>{{ Carbon\Carbon::parse($retribusi->jatuh_tempo)->locale('id_ID')->isoFormat('LL')}}</td>
          <td>{{ Carbon\Carbon::parse($retribusi->jatuh_tempo)->locale('id_ID')->Format('Y')}}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
                <a  class="dropdown-item editbtn" href="/laporan/{{ $retribusi->id}}"
                  ><i class="bx bx-detail me-1"></i> Detail</a
                >
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
       <td  > {{ rupiah($total) }}</td>
      </tr>
      </tbody>
    </table>
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

      <form action="/lapcetak" method="get">
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
        <div class="col-12 mb-3">
          <label for="provider" class="form-label">Tahun</label>
          <select class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun" >
            <option value="">== Pilih Tahun ==</option>
          @foreach ($tahun as $tahun)
          {{-- @if (old('tahun_id') == $tahun->id)
          <option value="{{ $tahun->id }}" selected>{{ $tahun->year}}</option>
          @else --}}
          <option value="{{ $tahun->year }}">{{ $tahun->year}}</option>
          {{-- @endif --}}
           @endforeach
        </select>
        @error('tahun')
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

 <!-- Small Modal -->

 <!--/ Hoverable Table rows -->
   {{-- @include('pegawai.create')
   @include('pegawai.edit') --}}
   
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
   <script>
         $(document).ready(function() {
                $('#provider_id').on('change', function(){
                    var kode_provider = $(this).val();
                    console.log(kode_provider);
                    if (kode_provider) {
                        $.ajax({
                            url:'/tagihan/' + kode_provider,
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