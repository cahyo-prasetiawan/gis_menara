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

  //hybrid : s,h
  //satelite : s
  //street : m
  //terain : p
  
//    var map = L.map('map').setView([-1.5016624,102.1162189], 13);
//       L.tileLayer('http://{s}.google.com/vt?lyrs=s&x={x}&y={y}&z={z}',{
//       maxZoom: 19,
//       subdomains:['mt0','mt1','mt2','mt3']
//   }).addTo(map);
  
  
//   // var towerIcon = L.icon({
//   //     iconUrl: 'tower.png',
//   //     iconSize:     [20, 40], // size of the icon
//   //     shadowSize:   [50, 64], // size of the shadow
//   //     iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
//   //     shadowAnchor: [4, 62],  // the same for the shadow
//   //     popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
//   // });
  
//   L.marker([-1.5016624,102.1162189]).addTo(map);

//  map.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();
// circle.bindPopup("I am a circle.");
// polygon.bindPopup("I am a polygon.")

// const popup = L.popup()
// 		.setLatLng([-1.5016624,102.1162189])
// 		.setContent('I am a standalone popup.')
// 		.openOn(map);

// 	function onMapClick(e) {
// 		popup
// 			.setLatLng(e.latlng)
// 			.setContent(`You clicked the map at ${e.latlng.toString()}`)
// 			.openOn(map);
// 	}

// 	map.on('click', onMapClick);


const map = L.map('map').setView([-1.5016624,102.1162189], 15);

const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 19,
  attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

var towerIcon = L.icon({
      iconUrl: '/storage/post-icons/U7fTbhU28w5xrvyytesGhrsUIjS2OQxsYTm2Z4ac.png',
      iconSize:     [40, 60], // size of the icon
      shadowSize:   [50, 64], // size of the shadow
      iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
      shadowAnchor: [4, 62],  // the same for the shadow
      popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
  });

const marker = L.marker([-1.5014000,102.1162189], {icon: towerIcon}).addTo(map)
  .bindPopup('<b>Hello world!</b><br />I am a popup.').openPopup();

const circle = L.circle([-1.5016624,102.1162189], {
  color: 'red',
  fillColor: '#f03',
  fillOpacity: 0.5,
  radius: 500
}).addTo(map).bindPopup('I am a circle.');

const polygon = L.polygon([
  [-1.489297, 102.122769],
  [-1.497627, 102.091227],
  [-1.505184, 102.098007]
]).addTo(map).bindPopup('I am a polygon.');



const popup = L.popup()
  .setLatLng([-1.485078, 102.102814])
  .setContent('I am a standalone popup.')
  .openOn(map);

function onMapClick(e) {
  popup
    .setLatLng(e.latlng)
    .setContent(`You clicked the map at ${e.latlng.toString()}`)
    .openOn(map);
}

map.on('click', onMapClick);


  
  </script>

  </body>

</html>
