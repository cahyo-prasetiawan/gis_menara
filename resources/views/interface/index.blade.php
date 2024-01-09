@extends('interface.parsial.main')

@section('content')

<div class="container-fluid px-0 mb-5" >
       
       <div class="col-md-12 "  id="map">
                 
       </div>
      
   
</div>
<!-- Carousel End -->


<!-- Features Start -->
<div class="container-xxl py-5">
   <div class="container">
       <div class="row g-0 feature-row justify-content-center">
           <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
               <div class="feature-item border h-100 p-5">
                   <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                    <img class="img-fluid" src="{{ asset('../assetHome/img/tower.png') }}" alt="Icon">
                   </div>
                   <h5 class="mb-3">Jumlah Menara</h5>
                   <p class="mb-0 text-center">{{ @count($tampil) }}</p>
                   <h5 class="mb-3 text-center">Menara</h5>
               </div>
           </div>
           <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
               <div class="feature-item border h-100 p-5">
                   <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                       <img class="img-fluid" src="{{ asset('../assetHome/img/dis.png') }}" alt="Icon">
                   </div>
                   <h5 class="mb-3">Tagihan Retribusi</h5>
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
               @if(count($retribusis)>0)
                   <p class="mb-0">{{ rupiah($tagihan) }}</p>
                   @else
                   <p class="mb-0">Tidak Ada</p>
                   @endif
               </div>
           </div>
           <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
               <div class="feature-item border h-100 p-5">
                   <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                    <img class="img-fluid" src="{{ asset('../assetHome/img/map.png') }}" alt="Icon">
                   </div>
                   <h5 class="mb-3">Total Kecamatan</h5>
                   {{-- <p class="mb-0 text-center">{{ @count($) }}</p> --}}
                   <p class="mb-0 text-center">{{ @count($total_kecamatan) }}</p>
                   <h5 class="mb-3 text-center">Kecamatan</h5>
               </div>
           </div>
           
       </div>
   </div>
</div>
<!-- Features End -->


<!-- Service Start -->
<div class="container-xxl py-5">
   <div class="container">
       <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
          
           <h1 class=" mb-2">Daftar Menara</h1>
           <a href="/halmenara" class="btn btn-primary mb-3">Lihat Semua</a>
       </div>
       <div class="row g-4">

        @foreach($tampil1 as $menara)
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <div class="team-item rounded overflow-hidden pb-4">
                <img class="img-fluid m1-1" src="{{ asset('storage/'.$menara->foto) }}"  width="80px;" style="margin: 1px" alt="">
                <h6 style="margin:4px;">{{ $menara->nama }}</h6>
                <span class="text-primary">{{ $menara->kecamatan->nama }}</span><br>
                <a class="btn btn-primary justify-content-end" style="font-size:10px;" href="/lihat/{{ $menara->id }}">Detail</a>
                
            </div>
        </div>
           @endforeach
          
    
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


<!-- Quote Start -->
<div class="container-xxl py-5">
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