@extends('interface.parsial.main')

@section('content')


<!-- Page Header Start -->
<div class="container-fluid bg-white py-4  wow fadeIn" data-wow-delay="0.1s" >
  <div class="container text-center py-5" style="box-shadow: 0 2px">
      <h1 class=" text-black mb-4 animated slideInDown">Retribusi</h1>
      <nav aria-label="breadcrumb animated slideInDown">
          <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="/home">Dasboard</a>
              </li>
              <li class="breadcrumb-item active">Retribusi
              </li>
            
            </ol>
      </nav>
  </div>
</div>
<!-- Page Header End -->
<!-- Service Start -->
<div class="container-xxl py-5 flex-grow-1" >
   <div class="container">
       <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
          
        
       </div>
       <div class="row g-4">
        <div class="col-xl-3 col-md-2 col-12 invoice-actions">
            <div class="card">
              <div class="card-body">
                <form action="/halretribusi" method="get">
                    <div class="row mt-2">
                      <div class="col-8 p-0">
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
                      <div class="col-3" style="padding-left:5px;">
                        <button type="submit"  class="btn btn-primary  ">Filter</button>
                      </div>
                    </div>
                    </form>
               
               
              </div>
            </div>
          </div>
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
                   
                    <h4>Retribusi #{{ $sekarang }}</h4>
                    <div>
                      <span class="me-1">Jatuh Tempo:</span>
                      @foreach($tahunT as $tahun)
                      <span class="fw-semibold">{{ Carbon\Carbon::parse($tahun->jatuh_tempo)->locale('id_ID')->isoFormat('LL')}}</span><br>
                      @endforeach
                      <span class="fw-semibold">Keterangan : </span><br>
                      @foreach($status as $status)
                      @if($status->status == 1)
                      <h5 class="fw-bold text-center">Lunas</h5>
                      @else
                      <h5 class="fw-bold text-center text-danger">Belum Dibayar</h5>
                      @endif
                      @endforeach
                    </div>
                 
                  </div>
                </div>
              </div>
              <hr class="my-0" />
             
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
                   @if(count($menara)>0)
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
                    @else
                    <td colspan="6">
                     <h5 class="text-center">Tidak ada Tagihan</h5>
                    </td>
                   @endif
      
                    <tr>
                      <td colspan="3" class="align-top px-4 py-5">
                        <p class="mb-2">
                          <span class="me-1 fw-semibold">Kepada:</span>
                          <span>{{ Auth::user()->name }}</span>
                        </p>
                        <span>Terima Kasih</span>
                      </td>
                      <td class="text-end px-4 py-5">
                        <p class="mb-0">Total: </p>
                      </td>
                      <td class="px-4 py-5">
                        @foreach($total as $total)
                        <p class="fw-semibold mb-0"> {{ rupiah($total->tagihan) }}</p>
                        @endforeach
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
        
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                      <span class="fw-semibold">Catatan:</span>
                      <span>Bukti Catatan Penagihan Retribusi </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
       </div>
    
   </div>
</div>
<!-- Service End -->


{{-- <!-- Project Start -->
<div class="container-xxl pt-5">
   <div class="container">
       <div class="text-center text-md-start pb-5 pb-md-0 wow fadeInUp" data-wow-delay="0.1s"
           style="max-width: 500px;">
           <p class="fs-5 fw-medium text-primary">Our Projects</p>
           <h1 class="display-5 mb-5">We've Done Lot's of Awesome Projects</h1>
       </div>
       <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">
          
         
     
           @foreach ($tampil as $menara)
           <div class="project-item mb-5">
               <div class="position-relative ">
                   <img class=" justify-content-center" src="{{ asset('/storage/'.$menara->foto)}}" style="width: 150px; padding-left:100px;" alt="">
                   <div class="project-overlay">
                       <a class="btn btn-lg-square btn-light rounded-circle m-1" href="{{ asset('/storage/'.$menara->foto)}}"
                           data-lightbox="project"><i class="fa fa-eye"></i></a>
                       <a class="btn btn-lg-square btn-light rounded-circle m-1" href=""><i
                               class="fa fa-link"></i></a>
                   </div>
               </div>
               <div class="p-4">
                   <a class="d-block h5" href="">{{ $menara->menara }}</a>
                   <span>Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem</span>
               </div>
           </div>
           @endforeach
       </div>
   </div>
</div>
<!-- Project End --> --}}







@endsection