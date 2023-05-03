@extends('layouts.main')

@section('content')
   <div class="container-xxl flex-grow-1 container-p-y">
   
      {{ Breadcrumbs::render('jenis') }}
      
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
   <h5 class="card-header">Data Jenis Menara</h5>
   <div class="table-responsive text-nowrap">
       <a href="jenis/create" class="btn btn-primary ms-3 mb-2">Tambah data</a>
             <!-- Modal -->
     <table class="table table-hover">
       <thead>
         <tr>
           <th>#</th>
           <th>Jenis</th>
           <th>Tarif</th>
           <th>Dibuat</th>
           <th>Diubah</th>
           <th>Aksi</th>
         </tr>
       </thead>
       <tbody class="table-border-bottom-0">
        @if(count($biayas)>0)
           @foreach ($biayas as $biaya)
         <tr>
          <input type="hidden" class="delete_id" value="{{ $biaya->nama }}">
           <td>{{ $loop->iteration }}</td>
           <td>{{ $biaya->nama }} Kaki</td>
           <td>Rp. {{ $biaya->tarif }}</td>
           <td>{{ $biaya->created_at->diffForHumans() }}</td>
           <td>{{ $biaya->updated_at->diffForHumans() }}</td>
          <td>
             <div class="dropdown">
               <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                 <i class="bx bx-dots-vertical-rounded"></i>
               </button>
               <div class="dropdown-menu">
                 <a  class="dropdown-item editbtn" href="/jenis/{{ $biaya->id }}/edit"
                   ><i class="bx bx-edit-alt me-1"></i> Edit</a
                 >
                 <form action="/jenis/{{ $biaya->nama }}" method="post" >
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
                            url: 'jenis/' + deleteid,
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