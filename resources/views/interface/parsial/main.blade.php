<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $title }} - E-Menara </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ ('assetHome/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ ('assetHome/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ ('assetHome/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ ('assetHome/css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    
    <!-- Template Stylesheet -->
    <link href="{{ ('assetHome/css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="{{ asset('coba1/styles.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
    integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
    crossorigin=""/>

 <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>

     <link rel="preconnect" href="https://fonts.googleapis.com" />
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
     <link
       href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
       rel="stylesheet"
     />
 
     <!-- Icons. Uncomment required icon fonts -->
     <link rel="stylesheet" href="{{ asset('../assets/vendor/fonts/boxicons.css') }}" />
 
     <!-- Core CSS -->
     <link rel="stylesheet" href="{{ asset('../assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
     <link rel="stylesheet" href="{{ asset('../assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
     <link rel="stylesheet" href="{{ asset('../assets/css/demo.css') }}" />
 
     <!-- css leaflet control -->
 
     <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

     <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
     <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
 
     <!-- Vendors CSS -->
     <link rel="stylesheet" href="{{ asset('../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
 
     <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
     

     <link rel="stylesheet" href="{{ asset('../assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
 
    <!-- script chart -->
    <script src="{{ asset('..\assets\js\highchart.js') }}"></script>

     <style>
        #map { height: 600px;margin-top:70px;z-index: 0; }

       </style>
  
   <script src="https://cdn.chatify.com/javascript/loader.js" defer></script>

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
        <div class="textLoader" style="padding-left:10px;">
            <center>
            <b>Tolong Tunggu ... </b>
            </center>
        </div>
    </div>
    <!-- Spinner End -->
   @include('interface.parsial.navbar')
    <!-- Carousel Start -->

    @yield('content')

    

 <!-- Copyright Start -->
 <div class="container-fluid copyright py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                &copy; <a class="fw-medium text-light" href="#">E-Menara</a>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                Diskominfo © 2023 - 
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
            </div>
        </div>
    </div>
 </div>
 <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top" style="margin-bottom: 50px;"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ ('assetHome/lib/wow/wow.min.js')}}"></script>
    <script src="{{ ('assetHome/lib/easing/easing.min.js')}}"></script>
    <script src="{{ ('assetHome/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ ('assetHome/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{ ('assetHome/lib/lightbox/js/lightbox.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Template Javascript -->
    <script src="{{ ('assetHome/js/main.js')}}"></script>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>  
    <script src="{{ asset('dist/leaflet-routing-machine.js') }}"></script>     
        <script>
        
          //menampilkan map
          const mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>';
                const mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

                const streets =  L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}',{
                                maxZoom: 20,
                                subdomains:['mt0','mt1','mt2','mt3']
                            })

                const hybrid = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                    });

                const map = L.map('map', {
                    center:    [-1.5016624,102.1162189],
                    zoom: 10,
                    layers: [hybrid]
                });

                const baseLayers = {
                    'OpenStreetMap': hybrid,
                    'Streets': streets
                };

                // const overlays = {
                //         'Point': point
                //     };

                const layerControl = L.control.layers(baseLayers).addTo(map);

                const satellite = L.tileLayer('http://{s}.google.com/vt?lyrs=s&x={x}&y={y}&z={z}',{
                                maxZoom: 20,
                                subdomains:['mt0','mt1','mt2','mt3']
                            })
                layerControl.addBaseLayer(satellite, 'Satellite');
    
            var curLocation = [-1.5016624,102.1162189];
    
        
            var marker = new L.marker(curLocation, {
                draggable: 'true'
            }).bindPopup("<b>Geser untuk mendapatkan Koordinat");
    
                @foreach($tampil as $menara)
                var towerIcon{{ $menara->id }} = L.icon({
                    iconUrl: '{{ asset('/storage/'.$menara->icon) }}',
                    iconSize:     [30, 40], // size of the icon
                });
                L.marker([{{ $menara->lat }},{{ $menara->long }}], {icon: towerIcon{{ $menara->id }}}).addTo(map)
                .bindPopup("<img class='img-thumbnail' style='width:100px;' src='{{ asset('storage/'.$menara->foto) }}'><br><b>{{ $menara->menara }}</b><br>{{ $menara->alamat }}<br><a class='btn btn-success mb-1 p-1' href='/lihat/{{ $menara->mid }}'>Detail</a> <a class='btn btn-warning mb-1 p-1' href='/rute/{{ $menara->mid }}'>Rute</a>");
                @endforeach
    
                var geojson_id = '';
    
                @foreach($tampil as $kecamatan)
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
    
       
            
        //     map.locate({setView: true, maxZoom: 8});
        // function onLocationFound(e) {
        //   var radius = e.accuracy;
        //   var position = marker.getLatLng();
        //         L.marker(e.latlng, {icon: Icon}).addTo(map).bindPopup("<b>Hai!</b><br />Ini adalah lokasi mu");
        // }
       
        // map.on('locationfound', onLocationFound);
        
    
    
    
    </script>
    
  
</body>

</html>