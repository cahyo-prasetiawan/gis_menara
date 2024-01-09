@extends('interface.parsial.main')

@section('content')

<!-- Page Header Start -->
<div class="container-fluid  py-4  wow fadeIn" data-wow-delay="0.1s" >
    <div class="container text-center py-5" style="box-shadow: 0 2px">
        <h1 class=" text-black mb-4 animated slideInDown">Laporan</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="/home">Dasboard</a>
                </li>
                <li class="breadcrumb-item active">Laporan
                </li>
              
              </ol>
              @if (session()->has('success'))
              <div class="alert alert-primary col-lg-12" role="alert">
                {{ session('success') }}
              </div>
              @endif 
        </nav>
    </div>
</div>
<!-- Page Header End -->
<!-- Quote Start -->
<div class="container-xxl mb-5 py-1" >
   <div class="container">
       <div class="row g-5">
           <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
               <p class="fs-5 fw-medium text-primary">Kontak Kami</p>
               <h1 class="display-8 mb-4">Dinas Komunikasi, Informatika dan Persandian Bungo</h1>
               <p>Diskominfo di daerah kabupaten bungo 
                awalnya berasal dari dalam bagian kantor bupati yang termasuk humas disana. Lalu setelah itu humas di
                 pecah dan dijadikan kantor terpisah dari dalam bagian kantor bupati. Yang dimana kantor ini di dirikan bangunannya
                  sendiri lalu dilakukannya pembagian bidang untuk setiap pegawai negeri sipil yang bekerja. 
                 </p>
               <p class="mb-4"> Kantor dinas kominfo
                berdiri pada tahun 2020 dan sudah berusia 2 tahun yang masih dipimpin oleh bapak Zainadi, S.Pd., MM.</p>
               <a class="d-inline-flex align-items-center rounded overflow-hidden border border-primary" href="">
                   <span class="btn-lg-square bg-primary" style="width: 30px; height: 30px;">
                       <i class="fa fa-phone-alt text-white"></i>
                   </span>
                   <span class="fs-5 fw-medium mx-4">+012 345 6789</span>
               </a>
               <a class="d-inline-flex align-items-center rounded overflow-hidden border border-primary" href="">
                <span class="btn-lg-square bg-primary" style="width: 30px; height: 30px;">
                    <i class="fa fa-envelope text-white"></i>
                </span>
                <span class="fs-5 fw-medium mx-4">Kominfo@gmail</span>
            </a>
           </div>
           <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
               <h2 class="mb-1">Kirim Pesan</h2>
               <div class="row g-3">
                <form action="/pesan" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12 ms-0 mb-1">
                    <input type="hidden"  name="provider_id" value="{{ Auth::user()->provider_id }}">
                    </div>
                    <div class="col-sm-12 mb-2">
                        <div class="form-floating">
                            <select class="form-select  @error('laporan') is-invalid @enderror" id="service" name="laporan">
                                <option value="">=== Pilih ====</option>
                                <option value="Kesalahan Data Menara">Kesalahan Data Menara</option>
                                <option value="Kesalahan Tagihan Retribusi">Kesalahan Tagihan Retribusi</option>
                            </select>
                            <label for="service">Pilih Laporan</label>
                            @error('laporan')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                       <div class="col-12 mb-1">
                           <div class="form-floating">
                               <textarea class="form-control  @error('pesan') is-invalid @enderror" name="pesan" id="message"
                                   style="height: 130px"> {{ old('pesan') }}</textarea>
                               <label for="message">Masukkan Pesan</label>
                               @error('pesan')
                               <div class="invalid-feedback">
                               {{ $message }}
                               </div>
                               @enderror
                           </div>
                       </div>
                       <div class="col-12 text-center">
                           <button class="btn btn-primary w-100 py-2" type="submit">Kirim Pesan</button>
                       </div>
                    </form>
                
               </div>
           </div>
       </div>
   </div>
</div>
<!-- Quote Start -->






@endsection