@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/dasboard">Dasboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="/laporan">Data Laporan Retribusi</a>
        </li>
        <li class="breadcrumb-item active">Detail</li>
      </ol>

<div class="row invoice-preview">
    <!-- Invoice -->
    <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
      <div class="card invoice-preview-card">
        <div class="card-body">
          <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column p-sm-3 p-0">
            <div class="mb-xl-0 mb-4">
              <div class="d-flex svg-illustration mb-3 gap-2">
                <span class="app-brand-logo demo">
                    <img src="{{ asset('logo.png') }}" style="width:50px;" alt="">
                </span>
                <span class="app-brand-text demo text-body fw-bolder"  style="text-transform: capitalize;">Diskominfo</span>
              </div>
              <p class="mb-1">Jl. RM. Thaher No. 503 Muara Bungo 37214</p>
              <p class="mb-1">Email :info@bungokab.go.id</p>
              <p class="mb-0">Telp : 0747-21016</p>
            </div>
            <div>
              <h4>Laporan #{{ $tanggal}}</h4>
              <div class="mb-2">
                <span class="me-1">Dibuat:</span>
                <span class="fw-semibold">{{ $tanggalB }}</span>
              </div>
              <div>
                <span class="me-1">Jatuh Tempo:</span>
                <span class="fw-semibold">{{ $tanggalA }}</span>
              </div>
            </div>
          </div>
        </div>
        <hr class="my-0" />
        <div class="card-body">
          <div class="row p-sm-3 p-0">
            <div class="col-xl-12 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
              <h6 class="pb-0">Kepada:</h6>
              <p class="mb-1">{{ $retribusi->provider->name }}</p>
              <p class="mb-0">{{ $retribusi->provider->alamat }}</p>
            
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table border-top m-0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Menara</th>
                <th>kecamatan</th>
                <th>Alamat</th>
                <th>Jenis menara</th>
                <th>Tagihan</th>
              </tr>
            </thead>
            <tbody>
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
                @foreach ($menara as $menara)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $menara->nama }}</td>
                  <td>{{ $menara->knama }}</td>
                <td>{{ $menara->alamat }}</td>
                <td style="text-center">{{ $menara->jnama }} Kaki</td>
                <td>{{ rupiah($menara->tarif) }}</td>
              </tr>
              @endforeach

              <tr>
                <td colspan="3" class="align-top px-4 py-5">
                  <p class="mb-2">
                    <span class="me-1 fw-semibold">Pegawai:</span>
                    <span>{{ Auth::user()->name }}</span>
                  </p>
                  <span>Terima Kasih</span>
                </td>
                <td class="text-end px-4 py-5">
                  <p class="mb-0">Total: </p>
                </td>
                <td class="px-4 py-5">
                  <p class="fw-semibold mb-0"> {{ rupiah($total) }}</p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
  
        <div class="card-body">
          <div class="row">
            <div class="col-12">
                <span class="fw-semibold">Catatan:</span>
                <span>Bukti Catatan Penagihan Retribusi</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Invoice -->
  
    <!-- Invoice Actions -->
    <div class="col-xl-3 col-md-2 col-12 invoice-actions">
      <div class="card">
        <div class="card-body">
            <a class="btn btn-secondary d-grid w-100 mb-3"  target="_blank" href="/cetakR/{{  $retribusi->id }}"  data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="left" data-bs-html="true" title="" data-bs-original-title=" <span>Digunakan Untuk Mengeprint Document ataupun Menyimpan Documen</span>">
                Simpan / Print
              </a>
        
         
         
        </div>
      </div>
    </div>
    <!-- /Invoice Actions -->
  </div>
  
  
  <!-- /Send Invoice Sidebar -->
  
  <!-- Add Payment Sidebar -->
 
  <!-- /Add Payment Sidebar -->
  
  <!-- /Offcanvas -->
  
  
              
            </div>
            <!-- / Content -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
          

            <script>
                $(document).ready(function(){
                $("#tooltip").click(function(){
                    $('#tooltip').tooltip("toggle");
                });
                });
            </script>
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