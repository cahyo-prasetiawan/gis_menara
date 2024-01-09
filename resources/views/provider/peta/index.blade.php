@extends('layouts.main')
@section('content')
<style>
  #map { height: 90%; }

  .legend{
    background:white;
    padding:50px;
    font-size: 7px;
  }
  .info {
    padding: 10px;
    font: 12px/14px Arial, Helvetica, sans-serif;
    background: white;
    background: rgba(255,255,255,0.8);
    box-shadow: 0 0 15px rgba(31, 30, 30, 0.2);
    border-radius: 5px;
    }

  .legend i {
    width: 18px;
    height: 18px;
    float: left;
    margin-right: 8px;
    opacity: 0.7;
    
    }


 </style> 
    <div class="container-xxl flex-grow-1 container-p-y">

      {{ Breadcrumbs::render('peta') }}

                <div class="col-lg-12 mb-4 order-0">
                    <div class="col-xl ">
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <form action="/peta" method="get">   
                            <select class=" form-control @error('provider_id') is-invalid @enderror" id="provider_id" name="provider_id" >
                                <option value="">== Pilih Provider ==</option>
                              @foreach ($pemilik as $pemilik)
                              @if (old('pemilik_id') == $pemilik->id)
                              <option value="{{ $pemilik->id }}" selected>{{ $pemilik->name}}</option>
                              @else
                              <option value="{{ $pemilik->id }}"> {{ $pemilik->name}}</option>
                              @endif
                               @endforeach
                            </select>
                            @error('pemilik_id')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                          </div>

                          <div class="col-md-4">
                           
                        <div class="row">
                            <div class="col-7">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-company2" class="input-group-text"
                                ><i class="bx bx-broadcast"></i></span>
                              <select class="form-control @error('menara_id') is-invalid @enderror" id="menara_id" name="menara_id" onchange="cari(this.value)">
                            </select>
                              @error('menara_id')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                            </div>
                          </div>
                          <div class="col-2 ">
                            <button type="submit" class="btn btn-primary">Cari</button>
                          </div>
                        </div>
                        </form>
                          </div>
                       
                          
                        </div>
                    <div class="mb-3" id="map"></div>
                  
                    </div>
                  </div>
              </div>
              <!-- / Content -->
              
            </div>
            <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
          
        <script src="{{ asset('../dist/leaflet.markercluster-src.js') }}"></script>
    
            <script>

         

              $(document).ready(function() {
                $("#provider_id").select2({
                    theme: 'bootstrap5',
                    placeholder: "Pilih Provider"
                });

                $('#provider_id').on('change', function(){
                    var kode_provider = $(this).val();
                    console.log(kode_provider);
                    if (kode_provider) {
                        $.ajax({
                            url:'/cari/' + kode_provider,
                            type: 'GET',
                            data: {
                                '_token': '{{ csrf_token() }}'
                            },
                            dataType: 'json',
                            success: function(data){
                               if (data) {
                                // console.log(data);
                                $('#menara_id').empty();
                                $('#menara_id').append('<option class"form-control" value="">== pilih ===</option>');
                               
                                $.each(data,function(nama,kode){
                    $("#menara_id").append('<option class"form-control" value="'+kode.id+'">'+kode.nama+'</option>');
                });
                               } else {
                                
                               }
                            }
                        });
                    } else{

                    }
                    });

                  

                });

                
                // const point = L.layerGroup();

                // @foreach($menaras as $menara)
                //     var towerIcon{{ $menara->id }} = L.icon({
                //         iconUrl: '{{ asset('/storage/'.$menara->icon) }}',
                //         iconSize:     [30, 40], // size of the icon
                //     });
                //     L.marker([{{ $menara->lat }},{{ $menara->long }}], {icon: towerIcon{{ $menara->id }}}).addTo(point)
                //     .bindPopup("<img class='img-thumbnail' style='width:80px;' src='{{ asset('storage/'.$menara->foto) }}'><br><b>{{ $menara->nama }}</b><br><br><a class='btn btn-success mb-1 p-1' href='/menaraDetail/{{ $menara->id }}'>Detail</a> <a class='btn btn-success mb-1 p-1' href='/menaraRute/{{ $menara->id }}'>Rute</a>");
                //     @endforeach
                

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

                // var markers = L.markerClusterGroup();
                
                var curLocation = [-1.5016624,102.1162189];

            
                var mark = new L.marker(curLocation, {
                    draggable: 'true'
                }).bindPopup("<b>Geser untuk mendapatkan Koordinat");

                    
                    @foreach($menaras as $menara)
                    var towerIcon{{ $menara->id }} = L.icon({
                        iconUrl: '{{ asset('/storage/'.$menara->icon) }}',
                        iconSize:     [30, 40], // size of the icon
                    });
                  var marker =  L.marker([{{ $menara->lat }},{{ $menara->long }}], {icon: towerIcon{{ $menara->id }}}).bindPopup("<img class='img-thumbnail' style='width:80px;' src='{{ asset('storage/'.$menara->foto) }}'><br><b>{{ $menara->nama }}</b><br><br><a class='btn btn-success text-black mb-1 p-1' href='/menaraDetail/{{ $menara->id }}'>Detail</a> <a class='btn btn-warning text-black mb-1 p-1' href='/menaraRute/{{ $menara->id }}'>Rute</a>");
                    marker.addTo(map);
                    @endforeach
                   
                  

                    var legend = L.control({position: 'bottomright'});
                legend.onAdd = function(mymap){
                    var div = L.DomUtil.create('div', 'info legend');
                    labels = ['<strong>Provider</strong>'],
                   
                    categories = [' @foreach($providers as $provider) {{ $provider->name }}',' @endforeach '];
                
                        for (var i = 0; i < categories.length; i++) {
                               
                            if(i==0){
                                div.innerHTML += 
                                labels.push(
                                    '<img width="10" height:"20" class="img-thubnail" src="{{ asset('icon/c.png') }}" >' +
                                (categories[i] ? categories[i] : '+'));
                            }else if(i==1){
                                div.innerHTML += 
                                labels.push(
                                    '<img width="10" height:"20" class="img-thubnail" src="{{ asset('icon/d.png') }}" >' +
                                (categories[i] ? categories[i] : '+'));
                            }else if(i==2){
                                div.innerHTML += 
                                labels.push(
                                    '<img width="10" height:"20" class="img-thubnail" src="{{ asset('icon/e.png') }}" >' +
                                (categories[i] ? categories[i] : '+'));
                            }
                            else if(i==3){
                                div.innerHTML += 
                                labels.push(
                                    '<img width="10" height:"20" class="img-thubnail" src="{{ asset('icon/er.png') }}" >' +
                                (categories[i] ? categories[i] : '+'));
                            }
                            else if(i==4){
                                div.innerHTML += 
                                labels.push(
                                    '<img width="10" height:"20" class="img-thubnail" src="{{ asset('icon/g.png') }}" >' +
                                (categories[i] ? categories[i] : '+'));
                            }
                            else if(i==5){
                                div.innerHTML += 
                                labels.push(
                                    '<img width="10" height:"20" class="img-thubnail" src="{{ asset('icon/i.png') }}" >' +
                                (categories[i] ? categories[i] : '+'));
                            }
                            else if(i==6){
                                div.innerHTML += 
                                labels.push(
                                    '<img width="10" height:"20" class="img-thubnail" src="{{ asset('icon/in.png') }}" >' +
                                (categories[i] ? categories[i] : '+'));
                            }
                            else if(i==7){
                                div.innerHTML += 
                                labels.push(
                                    '<img width="10" height:"20" class="img-thubnail" src="{{ asset('icon/k.png') }}" >' +
                                (categories[i] ? categories[i] : '+'));
                            }
                            else if(i==8){
                                div.innerHTML += 
                                labels.push(
                                    '<img width="10" height:"20" class="img-thubnail" src="{{ asset('icon/p.png') }}" >' +
                                (categories[i] ? categories[i] : '+'));
                            }
                            else if(i==9){
                                div.innerHTML += 
                                labels.push(
                                    '<img width="10" height:"20" class="img-thubnail" src="{{ asset('icon/t.png') }}" >' +
                                (categories[i] ? categories[i] : '+'));
                            }
                            else if(i==10){
                                div.innerHTML += 
                                labels.push(
                                    '<img width="10" height:"20" class="img-thubnail" src="{{ asset('icon/s.png') }}" >' +
                                (categories[i] ? categories[i] : '+'));
                            }
                            else if(i==11){
                                div.innerHTML += 
                                labels.push(
                                    '<img width="10" height:"20" class="img-thubnail" src="{{ asset('icon/te.png') }}" >' +
                                (categories[i] ? categories[i] : '+'));
                            }
                            else{
                                div.innerHTML += 
                                labels.push();

                            }
                            }
                            div.innerHTML = labels.join('<br>');
                        return div;
                        };



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

            legend.addTo(map);
         
           

            function cari($id)
            {
           
           
            }
       
        
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