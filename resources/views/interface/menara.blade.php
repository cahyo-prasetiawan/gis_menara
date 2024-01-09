@extends('interface.parsial.main')

@section('content')


<!-- Page Header Start -->
<div class="container-fluid bg-white py-4  wow fadeIn" data-wow-delay="0.1s" >
  <div class="container text-center py-5" style="box-shadow: 0 2px">
      <h1 class="display-2 text-black mb-4 animated slideInDown">Menara</h1>
      <nav aria-label="breadcrumb animated slideInDown">
          <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="/home">Dasboard</a>
              </li>
              <li class="breadcrumb-item active">Menara
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
       <div class="card mb-3">
        <div class="card-body  d-flex justify-content-end">
          <form action="/halmenara" method="get">
              <div class="row mt-2 ">
                <div class="col-8 p-0 ">
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
                <div class="col-4" style="padding-left:5px;">
                  <button type="submit"  class="btn btn-primary">Filter</button>
                </div>
              </div>
              </form>
         
         
        </div>
      </div>
       <div class="row g-4">

        @foreach($tampil1 as $menara)
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <div class="team-item rounded overflow-hidden pb-4">
                <img class="img-fluid m-2" src="{{ asset('storage/'.$menara->foto) }}" width="80px;" style="margin: 1px" alt="">
                <h5 style="margin: 0px;">{{ $menara->nama }}</h5>
                <span class="text-primary">{{ $menara->kecamatan->nama }}</span><br>
                <a class="btn btn-primary justify-content-end" style="font-size:10px;" href="/lihat/{{ $menara->id}}">Detail</a>
                
            </div>
        </div>
           @endforeach

           {{ $tampil1->links('pagination::bootstrap-5') }}
    
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
<script>
   $(document).ready(function(){
          $('#kecamatan').select2({
                    theme: 'bootstrap5'
                });
       });
</script>






@endsection