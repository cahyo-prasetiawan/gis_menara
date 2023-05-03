@extends('layouts.main')
@section('content')
<style>
  #map { height: 90%; }

 </style> 
    <div class="container-xxl flex-grow-1 container-p-y">

      {{ Breadcrumbs::render('peta') }}

                <div class="col-lg-12 mb-4 order-0">
                    <div class="col-xl ">
                    <div class="" id="map"></div>
                    </div>
                  </div>
              </div>
              <!-- / Content -->
              
            </div>
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
           @endsection


//       {{-- function getLocation() {
//         if (navigator.geolocation) {
//             navigator.geolocation.getCurrentPosition(showPosition, showError);
//         } else {

//             alert('Your device is not support!');
//         }
//     }

//       function showPosition(data) {
//             document.getElementById('lat').value = data.coords.latitude
//             document.getElementById('long').value = data.coords.longitude
//         }

//         function showError(error) {

// let error_message = ''

// switch (error.code) {
// case error.PERMISSION_DENIED:
//     error_message = "User denied the request for Geolocation."
//     break;
// case error.POSITION_UNAVAILABLE:
//     error_message = "Location information is unavailable."
//     break;
// case error.TIMEOUT:
//     error_message = "The request to get user location timed out."
//     break;
// case error.UNKNOWN_ERROR:
//     error_message = "An unknown error occurred."
//     break;
// }

// alert(error_message)
// }

//         var mymap = ''
//     function showMap(latitude, longitude) {

//         //remove map and render the new map

//         //make map area
//         mymap = L.map("map").setView(
//             [latitude, longitude],
//             13
//         );

//         //setting maps using api mapbox not google maps, register and get tokens
//         L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
//             maxZoom: 19,
//             attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
//             }).addTo(map);

//          //add marker position with variabel latitude and longitude
//          L.marker([
//             latitude, longitude
//         ])
//             .addTo(mymap)
//             .bindPopup("Location");
//     }

//     getLocation() --}}