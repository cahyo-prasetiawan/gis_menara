@extends('layouts.main')

@section('content')
   <div class="container-xxl flex-grow-1 container-p-y">

     {{ Breadcrumbs::render('kecamatan') }}

       <div class="row">
           <div class="col-lg-12 mb-4 order-0">

<div class="card">
   <h5 class="card-header">Data Kecamatan</h5>
   <div class="table-responsive text-nowrap">
           <div class="d-flex align-items-center justify-content-between">
            <a href="kecamatan/create" class="btn btn-primary ms-3 mb-2" >Tambah data</a>
             <!-- Modal -->
            <form method="GET" action="/kecamatan">
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
           <th>Nama Kecamatan</th>
           <th>Geojson</th>
           <th>Warna</th>
           <th>Aksi</th>
         </tr>
       </thead>
       <tbody class="table-border-bottom-0">
        @if(count($kecamatans)>0)
           @foreach ($kecamatans as $kecamatan)
         <tr>
           <input type="hidden" class="delete_id" value="{{ $kecamatan->id }}">
           <td>{{ $loop->iteration }}</td>
           <td>{{ $kecamatan->nama }}</td>
           <td>{{ $kecamatan->geojson }}</td>
           <td style="color: {{ $kecamatan->warna }}">{{ $kecamatan->warna }}</td>
           <td>
             <div class="dropdown text-center">
               <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                 <i class="bx bx-dots-vertical-rounded"></i>
               </button>
               <div class="dropdown-menu">
                 <a href="/kecamatan/{{ $kecamatan->nama }}/edit" class="dropdown-item " 
                   ><i class="bx bx-edit-alt me-1"></i> Edit</a
                 >
                 <form action="kecamatan/{{ $kecamatan->id }}" method="post" >
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
           <td colspan="4">
            <h5 class="text-center">Tidak ada data</h5>
           </td>
          @endif
         </tr>
       </tbody>
     </table>
     <div class="container mt-2">
       {{ $kecamatans->links('pagination::bootstrap-5') }}
     </div>
   </div>
 </div>
</div>
</div>
</div>
 <!--/ Hoverable Table rows -->
   {{-- @include('pegawai.create')
   @include('pegawai.edit') --}}
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
                             url: 'kecamatan/' + deleteid,
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