@extends('layouts.main')
@section('content')
<style>
  #map { height: 90%; }

 </style> 
    <div class="container-xxl flex-grow-1 container-p-y">

      {{ Breadcrumbs::render('menara.create') }}

        <div class="row mt-2">
            <div class="col-lg-6 mb-4 order-0">
                <div class="col-xl ">
                    <div class="card mb-4">
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Tambah Data menara</h5>  
                      </div>
                      <div class="card-body">
                        <form action="/menara" method="POST" enctype="multipart/form-data">
                            @csrf
                       <div class="row mt-2">
                            <div class="mb-3">
                              <label class="form-label" for="basic-icon-default-company">Foto</label>
                                <img class="img-preview img-fluid mb-3 col-sm-2" >
                              <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-image-alt"></i
                              ></span>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" autofocus 
                                 accept="image/png,image/jpg,image/jpeg" onchange="previewImage()">                    
                                @error('foto')
                              <div class="invalid-feedback">
                              {{ $message }}
                              </div>
                              @enderror
                              </div>
                              <div class="form-text">Hanya Format JPG, GIF Atau PNG. Kapasistas Maksimal 2080Kb</div>
                            </div>
                          <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Nama Menara</label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-broadcast"></i
                              ></span>
                              <input
                                type="text"
                                name="nama"
                                class="form-control @error('nama') is-invalid @enderror"
                                id="basic-icon-default-fullname"
                                placeholder="Masukkan Nama Menara"
                                aria-label="Masukkan Nama Menara"
                                aria-describedby="basic-icon-default-fullname2"
                                value="{{ old('nama') }}"
                              />
                              @error('nama')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                            </div>
                          </div>

                          <div class="col-6 mb-3">
                            <label for="provider" class="form-label">Provider</label>
                            <select class="form-control @error('provider_id') is-invalid @enderror" name="provider_id" >
                                <option value="">== Pilih Provider ==</option>
                              @foreach ($providers as $provider)
                              @if (old('provider_id') == $provider->id)
                              <option value="{{ $provider->id }}" selected>{{ $provider->name}}</option>
                              @else
                              <option value="{{ $provider->id }}">{{ $provider->name}}</option>
                              @endif
                               @endforeach
                            </select>
                            @error('provider_id')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                          </div>
                          <div class="col-6 mb-3">
                            <label for="provider" class="form-label">Kecamatan</label>
                            <select class="form-control @error('kecamatan_id') is-invalid @enderror" id="kec" name="kecamatan_id">
                                <option value="">== Pilih Kecamatan ==</option>
                              @foreach ($kecamatans as $kecamatan)
                              @if (old('kecamatan_id') == $kecamatan->id)
                              <option value="{{ $kecamatan->id }}" selected onchange="ganti()">{{ $kecamatan->nama}}</option>
                              @else
                              <option value="{{ $kecamatan->id }}" onchange="ganti()">{{ $kecamatan->nama}}</option>
                              @endif
                               @endforeach
                            </select>
                            @error('kecamatan_id')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                          </div>
                          <div class="col-6 mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Alamat</label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-broadcast"></i
                              ></span>
                              <input
                                type="text"
                                name="alamat"
                                class="form-control @error('alamat') is-invalid @enderror"
                                id="basic-icon-default-fullname"
                                placeholder="Masukkan Alamat"
                                aria-label="Masukkan Alamat"
                                aria-describedby="basic-icon-default-fullname2"
                                value="{{ old('alamat') }}"
                              />
                              @error('alamat')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                            </div>
                          </div>
                          <div class="col-6 mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Tinggi</label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-broadcast"></i
                              ></span>
                              <input
                                type="number"
                                name="tinggi"
                                class="form-control @error('tinggi') is-invalid @enderror"
                                id="basic-icon-default-fullname"
                                placeholder="Tinggi"
                                aria-label="Tinggi"
                                aria-describedby="basic-icon-default-fullname2"
                                min="3" max="120"
                                value="{{ old('tinggi') }}"
                              />
                              <span class="input-group-text">Meter</span>
                            
                              @error('tinggi')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                            </div>
                          </div>
                          <div class="col-6 mb-3">
                            <label for="provider" class="form-label">Jenis Menara</label>
                            <select class="form-control @error('jenis_id') is-invalid @enderror" name="jenis_id">
                                <option value="">== Pilih Jenis Menara ==</option>
                              @foreach ($jeniss as $jenis)
                              @if (old('jenis_id') == $jenis->id)
                              <option value="{{ $jenis->id }}" selected>{{ $jenis->nama}} Kaki</option>
                              @else
                              <option value="{{ $jenis->id }}">{{ $jenis->nama}} Kaki</option>
                              @endif
                               @endforeach
                            </select>
                            @error('jenis_id')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                          </div>
                          <div class="col-6 mb-3">
                            <label for="tahun" class="form-label">Tahun</label>
                            <select class="form-control @error('tahun') is-invalid @enderror" name="tahun">
                                <option value="">== Pilih Tahun ==</option>
                                <?php $years = range(2000, strftime("%Y", time())); ?>
                               @foreach($years as $year)
                                 @if (old('tahun') == $year)
                                   <option value="{{ $year }}" selected>{{  $year }}</option>
                                 @else
                                   <option value="{{ $year }}" >{{ $year }}</option>
                                @endif
                               @endforeach
                            </select>
                            @error('tahun')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                          </div>

                          <div class="mb-3">
                          <button class="btn btn-primary btn-block" type="button" onclick="getlokasi()" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="" data-bs-original-title=" <span>Ketuk Untuk Mendatkan Koordinat Lokasi Saat Ini</span>">Dapatkan lokasi</button>
                          </div>
                          

                          <div class="col-6 mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Latitude</label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-search-alt"></i
                              ></span>
                              <input
                                type="text"
                                name="lat"
                                class="form-control @error('lat') is-invalid @enderror"
                                {{-- id="latlong" --}}
                                id="lat"
                                placeholder="Masukkan Latitude"
                                aria-label="Masukkan Latitude"
                                aria-describedby="basic-icon-default-fullname2"
                                value="{{ old('lat') }}"
                            
                              />
                              @error('lat')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                            </div>
                          </div>

                          <div class="col-6 mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Longitude</label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-search-alt"></i
                              ></span>
                              <input
                                type="text"
                                name="long"
                                class="form-control @error('long') is-invalid @enderror"
                                id="long"
                                placeholder="Masukkan Longitude"
                                aria-label="Masukkan Longitude"
                                aria-describedby="basic-icon-default-fullname2"
                                value="{{ old('long') }}"
                            
                              />
                              @error('long')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                            </div>
                          </div>
                         
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
        </div>
                <div class="col-lg-6 mb-4 order-0">
                    <div class="col-xl ">
                    <div style="height: 400px;" id="map"></div>
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
                    [-1.5016624,102.1162189],
                    9
                );
                      L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                   maxZoom: 20,
                                   attribution: '© OpenStreetMap'
                                 }).addTo(map);

                var latInput = document.querySelector("[name=lat]");
                var lngInput = document.querySelector("[name=long]");

        //         if (navigator.geolocation) {
        //     // getCurrentPosition digunakan untuk mendapatkan lokasi pengguna
        //     //showPosition adalah fungsi yang akan dijalankan
        //     navigator.geolocation.getCurrentPosition(showPosition);    
        // }

                var curLocation = [-1.5016624,102.1162189];

                const lat = document.querySelector('#lat');
                const lng = document.querySelector('#lng');
                var lokasi = [lat,lng];

                map.attributionControl.setPrefix(false);

                var marker = new L.marker(curLocation, {
                    draggable: 'true'
                }).bindTooltip("<b>Geser untuk mendapatkan Koordinat");
                

                marker.on('dragend', function(event) {
                    var position = marker.getLatLng();
                    marker.setLatLng(position, {
                        draggable: 'true'
                    }).bindPopup("<b>Geser untuk mendapatkan Koordinat").update();
                    $("#lat").val(position.lat);
                    $("#long").val(position.lng);
                    
                });
                map.addLayer(marker);


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
              

            //     var Icon = L.icon({
            //     iconUrl: '/storage/pin.gif',
            //     iconSize:     [50, 70], // size of the icon
            //     shadowSize:   [50, 64], // size of the shadow
            //     iconAnchor:   [22, 50], // point of the icon which will correspond to marker's location
            //     popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
            // });
                
            //     map.locate({setView: true, maxZoom: 8});
            // function onLocationFound(e) {
            //   var radius = e.accuracy;
            //   var position = marker.getLatLng();
            //         L.marker(e.latlng, {icon: Icon}).addTo(map).bindPopup("<b>Hai!</b><br />Ini adalah lokasi mu");
                  
            // //   document.getElementById('#lat').value = position.lat
            // // document.getElementById('#long').value = position.lng
            // }
           
            // map.on('locationfound', onLocationFound);
            
    var lok = document.getElementById("lokasi");
    
    function getlokasi() {
        //jika browser mendukung navigator.geolocation maka akan menjalankan perintah di bawahnya
        if (navigator.geolocation) {
            // getCurrentPosition digunakan untuk mendapatkan lokasi pengguna
            //showPosition adalah fungsi yang akan dijalankan
            navigator.geolocation.getCurrentPosition(showPosition);    
        }else {
            alert('Your device is not support!');
            }
    }
    
    function showPosition(posisi){

     

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
                  
   
            //   document.getElementById('#lat').value = position.lat
            // document.getElementById('#long').value = position.lng
            }
            
        // tampilkan kordinat di dalam elemen lokasi
        $("#lat").val(posisi.coords.latitude);
        $("#long").val(posisi.coords.longitude);

        map.on('locationfound', onLocationFound);
       
    }
                

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