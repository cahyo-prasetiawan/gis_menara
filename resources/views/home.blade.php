<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>WoOx Travel Bootstrap 5 Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('landing2/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('landing1/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('landing1/css/templatemo-woox-travel.css') }}">
    <link rel="stylesheet" href="{{ asset('landing1/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('landing1/css/animate.css') }}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('coba1/styles.css') }}">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
    integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
    crossorigin=""/>

 <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>

     <style>
      #map { height: 100%;z-index: 0; }

     </style>
<!--

TemplateMo 580 Woox Travel

https://templatemo.com/tm-580-woox-travel

-->

  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header" id="header">
    <nav class="nav container">
        <a href="#" class="nav__logo">Marlon</a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="#home" class="nav__link active-link">
                        <i class='bx bx-home-alt nav__icon'></i>
                        <span class="nav__name">Home</span>
                    </a>
                </li>
                
                <li class="nav__item">
                    <a href="#about" class="nav__link">
                      <img src="{{ asset('../assets/img/avatars/1.png') }}" alt="{{ Auth::guard('pengguna')->user()->name }}" class="nav__img">
                        <span class="nav__name">About</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="#skills" class="nav__link">
                        <i class='bx bx-book-alt nav__icon'></i>
                        <span class="nav__name">Skills</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="#portfolio" class="nav__link">
                        <i class='bx bx-briefcase-alt nav__icon'></i>
                        <span class="nav__name">Portfolio</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="#contactme" class="nav__link">
                        <i class='bx bx-message-square-detail nav__icon'></i>
                        <span class="nav__name">Contactme</span>
                    </a>
                </li>
            </ul>
        </div>
        
        <img src="{{ asset('../assets/img/avatars/1.png') }}" alt="{{ Auth::guard('pengguna')->user()->name }}" class="nav__img">
        
    </nav>
</header>

  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  <section id="section-1">
    <div class="col-md-12"  id="map">
                      
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="more-info">
            <div class="row">
              <div class="col-lg-3 col-sm-6 col-6">
                <i class="fa fa-user"></i>
                <h4><span>Population:</span><br>44.48 M</h4>
              </div>
              <div class="col-lg-3 col-sm-6 col-6">
                <i class="fa fa-globe"></i>
                <h4><span>Territory:</span><br>275.400 KM<em>2</em></h4>
              </div>
              <div class="col-lg-3 col-sm-6 col-6">
                <i class="fa fa-home"></i>
                <h4><span>AVG Price:</span><br>$946.000</h4>
              </div>
              <div class="col-lg-3 col-sm-6 col-6">
                <div class="main-button">
                  <a href="about.html">Explore More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->
  
  <div class="visit-country">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="section-heading">
            <h2>Visit One Of Our Countries Now</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8">
          <div class="items">
            <div class="row">
              <div class="col-lg-12">
                <div class="item">
                  <div class="row">
                    <div class="col-lg-4 col-sm-5">
                      <div class="image">
                        <img src="{{ asset('landing1/images/country-01.jpg') }}" alt="">
                      </div>
                    </div>
                    <div class="col-lg-8 col-sm-7">
                      <div class="right-content">
                        <h4>SWITZERLAND</h4>
                        <span>Europe</span>
                        <div class="main-button">
                          <a href="about.html">Explore More</a>
                        </div>
                        <p>Woox Travel is a professional Bootstrap 5 theme HTML CSS layout for your website. You can use this layout for your commercial work.</p>
                        <ul class="info">
                          <li><i class="fa fa-user"></i> 8.66 Mil People</li>
                          <li><i class="fa fa-globe"></i> 41.290 km2</li>
                          <li><i class="fa fa-home"></i> $1.100.200</li>
                        </ul>
                        <div class="text-button">
                          <a href="about.html">Need Directions ? <i class="fa fa-arrow-right"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="item">
                  <div class="row">
                    <div class="col-lg-4 col-sm-5">
                      <div class="image">
                        <img src="landing1/images/country-02.jpg" alt="">
                      </div>
                    </div>
                    <div class="col-lg-8 col-sm-7">
                      <div class="right-content">
                        <h4>CARIBBEAN</h4>
                        <span>North America</span>
                        <div class="main-button">
                          <a href="about.html">Explore More</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                        <ul class="info">
                          <li><i class="fa fa-user"></i> 44.48 Mil People</li>
                          <li><i class="fa fa-globe"></i> 275.400 km2</li>
                          <li><i class="fa fa-home"></i> $946.000</li>
                        </ul>
                        <div class="text-button">
                          <a href="about.html">Need Directions ? <i class="fa fa-arrow-right"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="item last-item">
                  <div class="row">
                    <div class="col-lg-4 col-sm-5">
                      <div class="image">
                        <img src="landing1/images/country-03.jpg" alt="">
                      </div>
                    </div>
                    <div class="col-lg-8 col-sm-7">
                      <div class="right-content">
                        <h4>FRANCE</h4>
                        <span>Europe</span>
                        <div class="main-button">
                          <a href="about.html">Explore More</a>
                        </div>
                        <p>We hope this WoOx template is useful for you, please support us a <a href="https://paypal.me/templatemo" target="_blank">small amount of PayPal</a> to info [at] templatemo.com for our survival. We really appreciate your contribution.</p>
                        <ul class="info">
                          <li><i class="fa fa-user"></i> 67.41 Mil People</li>
                          <li><i class="fa fa-globe"></i> 551.500 km2</li>
                          <li><i class="fa fa-home"></i> $425.600</li>
                        </ul>
                        <div class="text-button">
                          <a href="about.html">Need Directions ? <i class="fa fa-arrow-right"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <ul class="page-numbers">
                  <li><a href="#"><i class="fa fa-arrow-left"></i></a></li>
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#"><i class="fa fa-arrow-right"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="side-bar-map">
            <div class="row">
              <div class="col-lg-12">
                <div id="map">
               </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="call-to-action">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h2>Are You Looking To Travel ?</h2>
          <h4>Make A Reservation By Clicking The Button</h4>
        </div>
        <div class="col-lg-4">
          <div class="border-button">
            <a href="reservation.html">Book Yours Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2036 <a href="#">WoOx Travel</a> Company. All rights reserved. 
          <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a> Distribution: <a href="https://themewagon.com target="_blank" >ThemeWagon</a></p>
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('../landing1/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('../landing1/bootstrap/js/bootstrap.min.js') }}"></script>

  <script src="{{ asset('../landing1/js/isotope.min.js') }}"></script>
  <script src="{{ asset('../landing1/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('../landing1/js/wow.js') }}"></script>
  <script src="{{ asset('../landing1/js/tabs.js') }}"></script>
  <script src="{{ asset('../landing1/js/popup.js') }}"></script>
  <script src="{{ asset('../landing1/js/custom.js') }}"></script>
  <script src="{{ asset('coba2/main.js') }}"></script>
  <script>
    function bannerSwitcher() {
      next = $('.sec-1-input').filter(':checked').next('.sec-1-input');
      if (next.length) next.prop('checked', true);
      else $('.sec-1-input').first().prop('checked', true);
    }

    var bannerTimer = setInterval(bannerSwitcher, 5000);

    $('nav .controls label').click(function() {
      clearInterval(bannerTimer);
      bannerTimer = setInterval(bannerSwitcher, 5000)
    });

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>       
            <script>
            
              //menampilkan map
              const map = L.map('map').setView(
                    [-1.5016624,102.1162189],
                    10
                );
                      L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                   maxZoom: 24,
                                   attribution: '© OpenStreetMap'
                                 }).addTo(map);


                var curLocation = [-1.5016624,102.1162189];

            
                var marker = new L.marker(curLocation, {
                    draggable: 'true'
                }).bindPopup("<b>Geser untuk mendapatkan Koordinat");

                    @foreach($menaras as $menara)
                    var towerIcon{{ $menara->id }} = L.icon({
                        iconUrl: '{{ asset('/storage/'.$menara->provider->icon) }}',
                        iconSize:     [30, 40], // size of the icon
                    });
                    L.marker([{{ $menara->lat }},{{ $menara->long }}], {icon: towerIcon{{ $menara->id }}}).addTo(map)
                    .bindPopup("<img class='img-thumbnail' src='{{ asset('storage/'.$menara->foto) }}'><br><b>Lolasi Menara Ini</b><br>{{ $menara->alamat }}<br><a class='btn btn-success mb-1 p-1'>Detail</a>");
                    @endforeach

                    var geojson_id = '';

                    @foreach($kecamatans as $kecamatan)
                    // proses baca file json yang ada di path /asssets/files/
                    // sesuaikan path ini dengan lokasi tempat kalian menyimpan file data geojson
                    $.getJSON("{{ asset('storage/'.$kecamatan->geojson) }}", function(data){
                        //deklarasi variable map dengan fungsi L.map
                        geojson_id = data;//variabel yang isinya data geojson
                        
                         //style untuk geojson, silahkan ubah sesuai kebutuhan
                function style(feature) {
                    return {
                        fillColor: '{{ $kecamatan->warna }}',
                        weight: 2,
                        opacity: 1,
                        color: '{{ $kecamatan->warna }}',
                        dashArray: '3',
                        fillOpacity: 0.4
                    };
                }
 
                //fungsi untuk menggunakan geojson
                L.geoJSON(geojson_id, {
                    style: style
                }).addTo(map).bindTooltip('{{ $kecamatan->nama }}');
                   
 
            }).fail(function(){
                console.log("An error has occurred.");
            });
            @endforeach

                var Icon = L.icon({
                iconUrl: '/storage/pin.gif',
                iconSize:     [50, 70], // size of the icon
                shadowSize:   [50, 64], // size of the shadow
                iconAnchor:   [22, 50], // point of the icon which will correspond to marker's location
                popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
            });
                
                map.locate({setView: true, maxZoom: 8});
            function onLocationFound(e) {
              var radius = e.accuracy;
              var position = marker.getLatLng();
                    L.marker(e.latlng, {icon: Icon}).addTo(map).bindPopup("<b>Hai!</b><br />Ini adalah lokasi mu");
            }
           
            map.on('locationfound', onLocationFound);
    

       
        
    </script>

  </body>

</html>
