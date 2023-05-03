@extends('layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
   
        {{ Breadcrumbs::render('dasboard') }}
        {{-- @if(session()->has('berhasil'))
        <div class="alert alert-success alert-dismissible fade show text-dark" role="alert">
          {{ session('berhasil') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif --}}
        <div id="flash" data-flash="{{ session('berhasil') }}"> </div>
        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                  <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                      <div class="card-body">
                        <h5 class="card-title text-primary">Selamat Datang, 
                          @if (Str::length(Auth::guard('user')->user()) > 0 )
                         {{ Auth::guard('user')->user()->name }}
                          @elseif (Str::length(Auth::guard('pengguna')->user()) > 0)
                          {{ Auth::guard('pengguna')->user()->name }}
                          @endif
                          ! 🎉</h5>
                        <p class="mb-4">
                          You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                          your profile.
                        </p>

                        <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
                      </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                      <div class="card-body pb-0 px-0 px-md-4">
                        <img
                          src="../assets/img/illustrations/man-with-laptop-light.png"
                          height="140"
                          alt="View Badge User"
                          data-app-dark-img="illustrations/man-with-laptop-dark.png"
                          data-app-light-img="illustrations/man-with-laptop-light.png"
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 col-md-4 order-1">
                <div class="row">
                  <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">
                            <i class="bg bg-blue bx bx-broadcast"></i>
                          </div>
                          <div class="dropdown">
                            <button
                              class="btn p-0"
                              type="button"
                              id="cardOpt3"
                              data-bs-toggle="dropdown"
                              aria-haspopup="true"
                              aria-expanded="false"
                            >
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                              <a class="dropdown-item" href="/menara">Lihat Detail</a>
                              <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                            </div>
                          </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Total Menara</span>
                        <h3 class="card-title mb-2 text-center">{{ $jumlah }} </h3>
                        <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +{{ $sekarang }} Menara</small>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">
                            <img
                              src="../assets/img/icons/unicons/wallet-info.png"
                              alt="Credit Card"
                              class="rounded"
                            />
                          </div>
                          <div class="dropdown">
                            <button
                              class="btn p-0"
                              type="button"
                              id="cardOpt6"
                              data-bs-toggle="dropdown"
                              aria-haspopup="true"
                              aria-expanded="false"
                            >
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                              <a class="dropdown-item" href="javascript:void(0);">View More</a>
                              <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                            </div>
                          </div>
                        </div>
                        <span>Sales</span>
                        <h3 class="card-title text-nowrap mb-1">${{ $retribusi }}</h3>
                        <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-12 col-md-4 order-1">
                <div class="row">
                  <div class="col-lg-8 col-md-12 col-6 mb-4" >
                    <div class="card">
                      <div class="card-body">
                        <div class="grafik" id="grafik"></div>
                      </div>
                    </div>
                   
                  </div>
                  <div class="col-lg-4 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                          <div class="text-center">
                            <div class="dropdown">
                              <button
                                class="btn btn-sm btn-outline-primary dropdown-toggle"
                                type="button"
                                id="growthReportId"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                2022
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                                <a class="dropdown-item" href="javascript:void(0);">2021</a>
                                <a class="dropdown-item" href="javascript:void(0);">2020</a>
                                <a class="dropdown-item" href="javascript:void(0);">2019</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div id="Chart"></div>
                        <div class="text-center fw-semibold pt-3 mb-2">62% Company Growth</div>
  
                        <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                          <div class="d-flex">
                            <div class="me-2">
                              <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
                            </div>
                            <div class="d-flex flex-column">
                              <small>2022</small>
                              <h6 class="mb-0">$32.5k</h6>
                            </div>
                          </div>
                          <div class="d-flex">
                            <div class="me-2">
                              <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                            </div>
                            <div class="d-flex flex-column">
                              <small>2021</small>
                              <h6 class="mb-0">$41.2k</h6>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
          

        </div>

        
        {{-- <div class="col-lg-12 col-md-4 order-1">
          <div class="row">
            <div class="col-lg-8 col-md-12 col-6 mb-4" id="map">
              
             
            </div>
            <div class="col-lg-4 col-md-12 col-6 mb-4">
              <div class="card">
                  <div class="card-body">
                    <div class="text-center">
                      <div class="dropdown">
                        <button
                          class="btn btn-sm btn-outline-primary dropdown-toggle"
                          type="button"
                          id="growthReportId"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          2022
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                          <a class="dropdown-item" href="javascript:void(0);">2021</a>
                          <a class="dropdown-item" href="javascript:void(0);">2020</a>
                          <a class="dropdown-item" href="javascript:void(0);">2019</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="Chart"></div>
                  <div class="text-center fw-semibold pt-3 mb-2">62% Company Growth</div>

                  <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                    <div class="d-flex">
                      <div class="me-2">
                        <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
                      </div>
                      <div class="d-flex flex-column">
                        <small>2022</small>
                        <h6 class="mb-0">$32.5k</h6>
                      </div>
                    </div>
                    <div class="d-flex">
                      <div class="me-2">
                        <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                      </div>
                      <div class="d-flex flex-column">
                        <small>2021</small>
                        <h6 class="mb-0">$41.2k</h6>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
    

  </div> --}}
    </div>
    <div class="buy-now">
      <a
        href="#"
        class="btn btn-danger btn-buy-now"
        ><i class="bx bx-envelope"></i></a
      >
    </div>

<script>

  //hybrid : s,h
  //satelite : s
  //street : m
  //terain : p
  
  //  var map = L.map('map').setView([-1.5016624,102.1162189], 9);
  //  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
  //                                  maxZoom: 24,
  //                                  attribution: '© OpenStreetMap'
  //                                }).addTo(map);
  
  
  // // var towerIcon = L.icon({
  // //   iconUrl: '/storage/pin.gif',
  // //     iconSize:     [20, 40], // size of the icon
  // // });
  // @foreach($menaras as $menara)
  // var towerIcon{{ $menara->id }} = L.icon({
  //   iconUrl: '{{ asset('/storage/'.$menara->provider->icon) }}',
  //     iconSize:     [30, 40], // size of the icon
  // });
  // L.marker([{{ $menara->lat }},{{ $menara->long }}], {icon: towerIcon{{ $menara->id }}}).addTo(map)
  // .bindPopup("<img class='img-thumbnail' src='{{ asset('storage/'.$menara->foto) }}'><br><b>Lolasi Menara Ini</b><br>{{ $menara->alamat }}");
  // @endforeach
      
  //     var geojson_id = '';

  //   @foreach($kecamatans as $kecamatan)
  //   // proses baca file json yang ada di path /asssets/files/
  //   // sesuaikan path ini dengan lokasi tempat kalian menyimpan file data geojson
  //   $.getJSON("{{ asset('storage/'.$kecamatan->geojson) }}", function(data){
  //       //deklarasi variable map dengan fungsi L.map
  //       geojson_id = data;//variabel yang isinya data geojson
        
  //       //style untuk geojson, silahkan ubah sesuai kebutuhan
  //   function style(feature) {
  //   return {
  //       fillColor: '{{ $kecamatan->warna }}',
  //       weight: 2,
  //       opacity: 1,
  //       color: '{{ $kecamatan->warna }}',
  //       dashArray: '3',
  //       fillOpacity: 0.4
  //   };
  //   }

  //   //fungsi untuk menggunakan geojson
  //   L.geoJSON(geojson_id, {
  //   style: style
  //   }).addTo(map).bindTooltip('{{ $kecamatan->nama }}');


  //   }).fail(function(){
  //   console.log("An error has occurred.");
  //   });
  //   @endforeach
    
    var options = {
          series: [44, 55, 13, 43, 22],
          chart: {
          width: 300,
          type: 'donut',   
        },
      donut: {
        expandOnClick: false
      },
        labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 150
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#Chart"), options);
        chart.render();

        // var options = {
        //   series: [{
        //     name: "Desktops",
        //     data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
        // }],
        //   chart: {
        //   height: 350,
        //   type: 'area',
        //   stacked: false,
        //   zoom: {
        //     enabled: false
        //   }
          
        // },
        // toolbar: {
        //     autoSelected: 'zoom'
        //   },
        // dataLabels: {
        //   enabled: false
        // },
        // stroke: {
        //   curve: 'straight'
        // },
        // title: {
        //   text: 'Product Trends by Month',
        //   align: 'left'
        // },
        // grid: {
        //   row: {
        //     colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
        //     opacity: 0.5
        //   },
        // },
        // xaxis: {
        //   categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
        // }
        // };

        // var chart = new ApexCharts(document.querySelector("#grafik"), options);
        // chart.render();
       

        var jumlah = {{ json_encode($total) }};
        var tahun  = {{ json_encode($tahun) }};
        Highcharts.chart('grafik', {
          title : {
            text: 'Grafik Peningkatan Menara'
          },
          xAxis : {
            categories : tahun
          },
          yAxis : {
            title : {
              text : 'Jumlah Menara'
            }
          },
          // plotOptions : {
          //   series : {
          //     allowPointSelect: true
          //   }
          // },
          series: [
            {
              name: 'Jumlah Menara {{ $jumlah }} Dari Tahun Ini ',
              data: jumlah
            }
          ]
        });
  </script>
@endsection