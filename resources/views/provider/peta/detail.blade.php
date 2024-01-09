@extends('layouts.main')

<style>
    #map { height: 60%; }

   </style> 
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/dasboard">Dasboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="/peta">Peta</a>
        </li>
        <li class="breadcrumb-item active">Detail Data {{ $menara->nama }}</li>
      </ol>

    <div class="card mb-4">
      <h5 class="card-header">Detail Data</h5>
      <div class="card-body">
        <div class="row">
          <!-- Custom content with heading -->
          <div class="col-lg-6 mb-4 mb-xl-0 ">
            <small class="text-light fw-semibold">Data</small>
            <div class="mt-3">
                <div class="row mt-2">
                    <div class="col-12 mb-1">
                      <label class="form-label" for="basic-icon-default-company">Foto</label>
                      @if ($menara->foto)
                      <img src="{{ asset('storage/'.$menara->foto) }}" class="img-preview img-fluid mb-3 col-sm-3 d-block w-5 " > 
                      @else
                      <div class="demo-inline-spacing mt-3">Tidak Ada Foto </div>  
                      @endif
                    </div>

                    <div class="col-lg-12 col-md-4 order-1">
                      <div class="row">
                        <div class="col-lg-4 col-md-12 col-6 mb-4">
                          
                              <div class="demo-inline-spacing mt-3">
                                <ul class="list-group">
                                  <li class="list-group-item d-flex align-items-center">
                                    Site Name
                                  </li>
                                  <li class="list-group-item d-flex align-items-center">
                                    
                                   Provider
                                  </li>
                                  <li class="list-group-item d-flex align-items-center">
                                   Kecamatan
                                  </li>
                                  <li class="list-group-item d-flex align-items-center">
                                    Alamat
                                  </li>
                                  <li class="list-group-item d-flex align-items-center">
                                    Tinggi
                                  </li>
                                  <li class="list-group-item d-flex align-items-center">
                                  Jenis Menara
                                  </li>
                                  <li class="list-group-item d-flex align-items-center">
                                   Tahun
                                  </li>
                                </ul>
                              </div>
                             
                        </div>
                        <div class="col-lg-8 col-md-12 col-6 mb-4">
                       
                              <div class="demo-inline-spacing mt-3">
                                <ul class="list-group">
                                  <li class="list-group-item d-flex align-items-center">
                                    {{ $menara->nama }}
                                  </li>
                                  <li class="list-group-item d-flex align-items-center">
                                   {{ $menara->provider->name }}
                                  </li>
                                  <li class="list-group-item d-flex align-items-center">
                                   {{ $menara->kecamatan->nama }}
                                  </li>
                                  <li class="list-group-item d-flex align-items-center">
                                  {{ $menara->alamat }}
                                  </li>
                                  <li class="list-group-item d-flex align-items-center">
                                    {{ $menara->tinggi }} M
                                  </li>
                                  <li class="list-group-item d-flex align-items-center">
                                    {{ $menara->Jenis->nama}} Kaki
                                  </li>
                                  <li class="list-group-item d-flex align-items-center">
                                   {{ $menara->tahun }}
                                  </li>
                                </ul>
                              </div>
                          
                        </div>
                      </div>
                    </div>

                    {{-- <div class="col-lg-4 mb-3 order-0">
                      <div class="demo-inline-spacing mt-3">
                        <ul class="list-group">
                          <li class="list-group-item d-flex align-items-center">
                            Site Name
                          </li>
                          <li class="list-group-item d-flex align-items-center">
                            
                           Provider
                          </li>
                          <li class="list-group-item d-flex align-items-center">
                           Kecamatan
                          </li>
                          <li class="list-group-item d-flex align-items-center">
                            Alamat
                          </li>
                          <li class="list-group-item d-flex align-items-center">
                            Tinggi
                          </li>
                          <li class="list-group-item d-flex align-items-center">
                          Jenis Menara
                          </li>
                          <li class="list-group-item d-flex align-items-center">
                           Tahun
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-8 mb-3 order-1">
                      <div class="demo-inline-spacing mt-3">
                        <ul class="list-group">
                          <li class="list-group-item d-flex align-items-center">
                            {{ $menara->nama }}
                          </li>
                          <li class="list-group-item d-flex align-items-center">
                           {{ $menara->provider->name }}
                          </li>
                          <li class="list-group-item d-flex align-items-center">
                           {{ $menara->kecamatan->nama }}
                          </li>
                          <li class="list-group-item d-flex align-items-center">
                          {{ $menara->alamat }}
                          </li>
                          <li class="list-group-item d-flex align-items-center">
                            {{ $menara->tinggi }} M
                          </li>
                          <li class="list-group-item d-flex align-items-center">
                            {{ $menara->Jenis->nama}} Kaki
                          </li>
                          <li class="list-group-item d-flex align-items-center">
                           {{ $menara->tahun }}
                          </li>
                        </ul>
                      </div>
                    </div> --}}
                    <!--/ List group Icons -->
               
               
            </div>
            </div>
          </div>
          <div class="col-lg-6 mb-4">
            <small class="text-light fw-semibold">Lokasi</small>
            <div class="demo-inline-spacing mt-3">

                <a class="btn btn-primary btn-block" href="/menaraRute/{{ $menara->id }}" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="" data-bs-original-title=" <span>Ketuk Untuk Ke Menara</span>">Ke Menara</a>
                        

                <div style="height:300px;" id="map"></div>
                <div class="demo-inline-spacing mt-3">
                    <ul class="list-group">
                      <li class="list-group-item d-flex align-items-center">
                        <i class="bx bx-broadcast me-2"></i>
                        Latitude {{ $menara->lat }}
                      </li>
                      <li class="list-group-item d-flex align-items-center">
                        <i class="bx bx-broadcast me-2"></i>
                       Longitute {{ $menara->long }}
                      </li>
                    </ul>
                  </div>
            </div>
          </div>
          <!--/ Custom content with heading -->
        </div>
      </div>
    </div>
  </div>
            <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>       
    <script src="{{ asset('dist/leaflet-routing-machine.js') }}"></script>   
            <script>
               function previewImage()
              {
              const icon = document.querySelector('#foto');
              const imgPreview = document.querySelector('.img-preview');

              imgPreview.style.display = 'block';

              const oFReader = new FileReader();
              oFReader.readAsDataURL(icon.files[0]);

              oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
              }
              }

              //menampilkan map
              const map = L.map('map').setView(
                    [{{ $menara->lat }},{{ $menara->long }}],
                    12
                );
                      L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                   maxZoom: 24,
                                   attribution: '© OpenStreetMap'
                                 }).addTo(map);

                var latInput = document.querySelector("[name=lat]");
                var lngInput = document.querySelector("[name=long]");

                

                var curLocation = [{{ $menara->lat }},{{ $menara->long }}];

                const lat = document.querySelector('#lat');
                const lng = document.querySelector('#lng');
                var lokasi = [lat,lng];

                map.attributionControl.setPrefix(false);

                var marker = new L.marker(curLocation).bindPopup("<img class='img-thumbnail' src='{{ asset('storage/'.$menara->foto) }}'><br><b>Lolasi Menara Ini</b><br>{{ $menara->alamat }}");
                
                
                

             
                map.addLayer(marker);

                var geojson_id = '';

              // proses baca file json yang ada di path /asssets/files/
              // sesuaikan path ini dengan lokasi tempat kalian menyimpan file data geojson
              $.getJSON("{{ asset('storage/'.$menara->kecamatan->geojson) }}", function(data){
                  //deklarasi variable map dengan fungsi L.map
                  geojson_id = data;//variabel yang isinya data geojson
                  
                  //style untuk geojson, silahkan ubah sesuai kebutuhan
              function style(feature) {
              return {
                  fillColor: '{{ $menara->kecamatan->warna }}',
                  weight: 2,
                  opacity: 1,
                  color: '{{ $menara->kecamatan->warna }}',
                  dashArray: '3',
                  fillOpacity: 0.2
              };
              }

              //fungsi untuk menggunakan geojson
              L.geoJSON(geojson_id, {
              style: style
              }).addTo(map).bindTooltip('{{ $menara->kecamatan->nama }}');   

              }).fail(function(){
              console.log("An error has occurred.");
              });


                

                //  const map = L.map('map').setView([-1.5016624,102.1162189], 12);

                // const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                // maxZoom: 19,
                // attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                // }).addTo(map);


                // const marker = L.marker([-1.5014000,102.1162189]).addTo(map)
                // .bindPopup('<b>Hello world!</b><br />I am a popup.').openPopup();

                // const popup = L.popup()
                // .setLatLng([-1.5014000,102.1162189])
                // .setContent('I am a standalone popup.')
                // .openOn(map);


                // function onMapClick(e) {
                    
                //     var coord = e.latlng.toString().split(',');
                //     var lat = coord[0].split('(');
                //     var lng = coord[1].split(')');
                //     alert("You clicked the map at latitude: " + lat[1] + " and longitude:" + lng[0]);
                //     document.getElementById('lat').value = lat
                //     document.getElementById('long').value = lng
                // }

                // map.on('click', onMapClick);

//                 map.on('click',
// function(e){
// var coord = e.latlng.toString().split(',');
// var lat = coord[0].split('(');
// var lng = coord[1].split(')');
// alert("You clicked the map at latitude: " + lat[1] + " and longitude:" + lng[0]);
// });

// function getLocation() {
//                 if (navigator.geolocation) {
//                     navigator.geolocation.getCurrentPosition(showPosition, showError);
//                 } else {
    
//                     alert('Your device is not support!');
//                 }
//             }
    
//             // fill the latitude and longitude form with this function 
//             function showPosition(data) {
    
//                 document.getElementById('lat').value = data.coords.latitude
//                 document.getElementById('long').value = data.coords.longitude
//             }
    
    
//             // javascript function to show error
//             function showError(error) {
    
//                 let error_message = ''
    
//                 switch (error.code) {
//                     case error.PERMISSION_DENIED:
//                         error_message = "User denied the request for Geolocation."
//                         break;
//                     case error.POSITION_UNAVAILABLE:
//                         error_message = "Location information is unavailable."
//                         break;
//                     case error.TIMEOUT:
//                         error_message = "The request to get user location timed out."
//                         break;
//                     case error.UNKNOWN_ERROR:
//                         error_message = "An unknown error occurred."
//                         break;
//                 }
    
//                 alert(error_message)
//             }
    
            
            // var mymap = ''
            // function showMap(latitude, longitude) {
    
            //     //remove map and render the new map
            //     if (mymap) {
            //         mymap.remove();
            //         mymap = undefined
            //     }
    
            //     //make map area
            //     mymap = L.map("mapid").setView(
            //         [latitude, longitude],
            //         13
            //     );
    
            //     //setting maps using api mapbox not google maps, register and get tokens
            //     L.tileLayer(
            //         "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw", {
            //             maxZoom: 18,
            //             attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            //                 '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            //                 'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            //             id: "mapbox/streets-v11",
            //             tileSize: 512,
            //             zoomOffset: -1,
            //         }
            //     ).addTo(mymap);
    
    
            //     //add marker position with variabel latitude and longitude
            //     L.marker([
            //         latitude, longitude
            //     ])
            //         .addTo(mymap)
            //         .bindPopup("Location");
            // }
    
            // getLocation()

// var map = L.map('map'),
//     realtime = L.realtime({
//         url: 'https://wanderdrone.appspot.com/',
//         crossOrigin: true,
//         type: 'json'
//     }, {
//         interval: 3 * 1000
//     }).addTo(map);

// realtime.on('update', function() {
//     map.fitBounds(realtime.getBounds(), {maxZoom: 3});
// });

// var map_init = L.map('map', {
//             center: [9.0820, 8.6753],
//             zoom: 8
//         });
//         var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//             attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
//         }).addTo(map_init);

//         L.Control.geocoder().addTo(map_init);

//         if (!navigator.geolocation) {
//             console.log("Your browser doesn't support geolocation feature!")
//         } else {
//             setInterval(() => {
//                 navigator.geolocation.getCurrentPosition(getPosition)
//             }, 5000);
//         };
//         var marker, circle, lat, long, accuracy;

//         function getPosition(position) {
//             // console.log(position)
//             lat = position.coords.latitude
//             long = position.coords.longitude
//             accuracy = position.coords.accuracy

//             if (marker) {
//                 map_init.removeLayer(marker)
//             }

//             if (circle) {
//                 map_init.removeLayer(circle)
//             }

//             marker = L.marker([lat, long])
//             circle = L.circle([lat, long], { radius: accuracy })

//             var featureGroup = L.featureGroup([marker, circle]).addTo(map_init)

//             map_init.fitBounds(featureGroup.getBounds())

//             console.log("Your coordinate is: Lat: " + lat + " Long: " + long + " Accuracy: " + accuracy)
//         }

// var map = L.map('map').fitWorld();
//                       L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
//                                    maxZoom: 19,
//                                    attribution: '© OpenStreetMap'
//                                  }).addTo(map);
//             map.locate({setView: true, maxZoom: 16});
//             function onLocationFound(e) {
//               var radius = e.accuracy;
//               L.marker(e.latlng).addTo(map);
//               L.circle(e.latlng, radius).addTo(map);
//             }
            
//             map.on('locationfound', onLocationFound);

//   function getLocation() {
//                 if (navigator.geolocation) {
//                     navigator.geolocation.getCurrentPosition(showPosition, showError, data);
//                 } else {
    
//                     alert('Your device is not support!');
//                 }
//             }
    
//             // fill the latitude and longitude form with this function 
//             function showPosition(data) {
    
//                 document.getElementById('lat').value = data.coords.latitude
//                 document.getElementById('long').value = data.coords.longitude
//                 const a = data.coords.latitude
//                 const b = data.coords.langitude
//             }
    
//             const map = L.map('map').setView(
//             //         [a,b],
//             //         13
//             //     );
    

            //     const tiles =  L.tileLayer('http://{s}.google.com/vt?lyrs=s&x={x}&y={y}&z={z}',{
            //         maxZoom: 14,
            //         subdomains:['mt0','mt1','mt2','mt3']
            //     }).addTo(map);

            //     var latInput = document.querySelector("[name=lat]");
            //     var lngInput = document.querySelector("[name=long]");

                

            //     var curLocation = [-1.5016624,102.1162189];

            //     map.attributionControl.setPrefix(false);

            //     var marker = new L.marker(curLocation, {
            //         draggable: 'true'
            //     });

    //     var map_init = L.map('map', {
    //         center: [-1.5016624,102.1162189],
    //         zoom: 8
    //     });

    //     var latInput = document.querySelector("[name=lat]");
    //     var lngInput = document.querySelector("[name=long]");

    //     var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    //         attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    //     }).addTo(map_init);
    //     L.Control.geocoder().addTo(map_init);
    //     if (!navigator.geolocation) {
    //         console.log("Your browser doesn't support geolocation feature!")
    //     } else {
    //         setInterval(() => {
    //             navigator.geolocation.getCurrentPosition(getPosition)
    //         }, 5000);
    //     };
    //     var marker, circle, lat, long, accuracy;

    //     // function getPosition(position) {
    //     //     // console.log(position)
    //     //     lat = position.coords.latitude
    //     //     long = position.coords.longitude
    //     //     accuracy = position.coords.accuracy

    //     //     document.getElementById('lat').value = position.coords.latitude
    //     //     document.getElementById('long').value = position.coords.longitude

    //     //     if (marker) {
    //     //         map_init.removeLayer(marker)
    //     //     }

    //     //     if (circle) {
    //     //         map_init.removeLayer(circle)
    //     //     }

    //     //     marker = L.marker([lat, long])
    //     //     circle = L.circle([lat, long], { radius: accuracy })

    //     //     var featureGroup = L.featureGroup([marker, circle]).addTo(map_init)

    //     //     map_init.fitBounds(featureGroup.getBounds())

    //     //     console.log("Your coordinate is: Lat: " + lat + " Long: " + long + " Accuracy: " + accuracy)  
    //     // }

    //     map.attributionControl.setPrefix(false);

    // var marker = new L.marker( map_init, {
    //     draggable: 'true'
    // });

    // marker.on('dragend', function(event) {
    //                 var position = marker.getLatLng();
    //                 marker.setLatLng(position, {
    //                     draggable: 'true'
    //                 }).bindPopup(position).update();
    //                 $("#lat").val(position.lat);
    //                 $("#long").val(position.lng);
                    
    //             });
    //             map.addLayer(marker);
    //             getLocation()

        
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