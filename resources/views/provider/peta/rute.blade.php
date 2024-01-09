@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="{{ asset('dist/leaflet-routing-machine.css') }}" />
<style>
  #map { height: 90%; }

  .legend{
    background:white;
    padding:50px;
  }
  .info {
    padding: 20px;
    font: 14px/16px Arial, Helvetica, sans-serif;
    background: white;
    background: rgba(255,255,255,0.8);
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
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

    
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/dasboard">Dasboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="/peta">Peta Persebaran Menara</a>
            </li>
            <li class="breadcrumb-item active">Rute Ke Menara</li>
          </ol>

                <div class="col-lg-12 mb-4 order-0">
                    <div class="col-xl ">
                        <div class="row mt-2">
                      
                          </div>

                        </div>
                    <div class="mb-3" id="map"></div>
                  
                    </div>
                  </div>
             
              <!-- / Content -->
            
            <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
          
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>       
        <script src="{{ asset('dist/leaflet-routing-machine.js') }}"></script>
    
            {{-- <script>

         

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

                
 

              //menampilkan map
              const map = L.map('map').setView(
                    [-1.5016624,102.1162189],
                    10
                );

                //satelite = s&x
                //street   = m&x
                //hibrid   = s,h&x
                //terrain = p&x

                L.tileLayer('http://{s}.google.com/vt?lyrs=s&x={x}&y={y}&z={z}',{
                    maxZoom: 20,
                    subdomains:['mt0','mt1','mt2','mt3']
                }).addTo(map);

                               
            

                var curLocation = [-1.5016624,102.1162189];

            
                var marker = new L.marker(curLocation, {
                    draggable: 'true'
                }).bindPopup("<b>Geser untuk mendapatkan Koordinat");

                    


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

       
         
           

            L.Routing.control({
                waypoints: [
                    L.latLng(-1.5016624,102.1162189),
                    @foreach($menaras as $menara)
                    L.latLng({{ $menara->lat }},{{ $menara->long}})
                    @endforeach
                ]
            }).addTo(map);
       
        
    </script> --}}

<script>

    

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

        function onLocationFound(e) {
		const radius = e.accuracy / 2;

		const locationMarker = L.marker(e.latlng).addTo(map)
			.bindPopup(`Lokasi Anda`).openPopup();

            L.Routing.control({
                waypoints: [
                    L.latLng(e.latlng),
                    @foreach($menaras as $menara)
                    L.latLng({{ $menara->lat }},{{ $menara->long}})
                    @endforeach
                ]
            }).addTo(map);
	}

	function onLocationError(e) {
		alert(e.message);
	}

	map.on('locationfound', onLocationFound);
	map.on('locationerror', onLocationError);

	map.locate({setView: true, maxZoom: 16});  

        // L.Routing.control({
        //         waypoints: [
        //             L.latLng(-1.5016624,102.1162189),
        //             @foreach($menaras as $menara)
        //             L.latLng({{ $menara->lat }},{{ $menara->long}})
        //             @endforeach
        //         ]
        //     }).addTo(map);

         

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