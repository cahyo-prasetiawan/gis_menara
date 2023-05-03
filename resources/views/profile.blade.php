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
        <script type="text/javascript">
            var geojson_id = '', map;
 
            // proses baca file json yang ada di path /asssets/files/
            // sesuaikan path ini dengan lokasi tempat kalian menyimpan file data geojson
            $.getJSON("jujuhan ilir.geojson", function(data){
                //deklarasi variable map dengan fungsi L.map
                geojson_id = data;//variabel yang isinya data geojson
                var map = L.map('map', {
                            scrollWheelZoom: false, //disable zoom melalui scroll pada mouse
                            zoomControl: false //disable zoom control (static)
                        }).setView( [-1.5016624,102.1162189],
                    13); //set titik koordinat center dan zoom
                                                                    //sesuaikan titik koordinat dan zoom ini dengan posisi maps yang
                                                                    //ingin ditampilkan secara default 
                
                //set base maps menggunakan google maps
                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                   maxZoom: 19,
                                   attribution: '© OpenStreetMap'
                                 }).addTo(map);

 
                //style untuk geojson, silahkan ubah sesuai kebutuhan
                function style(feature) {
                    return {
                        fillColor: '#ff7800',
                        weight: 2,
                        opacity: 1,
                        color: '#ff7800',
                        dashArray: '3',
                        fillOpacity: 0.7
                    };
                }
 
                //fungsi untuk menggunakan geojson
                L.geoJSON(geojson_id, {
                    style: style
                }).addTo(map);   
 
            }).fail(function(){
                console.log("An error has occurred.");
            });
 
          </script>
           @endsection