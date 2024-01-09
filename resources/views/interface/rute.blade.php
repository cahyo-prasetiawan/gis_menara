@extends('interface.parsial.main')

@section('content')
<style>
    #map{
        height: 620px;
    }
</style>
<div class="container-fluid px-0 mb-5" >
       
    <div class="col-md-12 "  id="map">
              
    </div>
   

</div>

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
            .bindPopup("<img class='img-thumbnail' style='width:100px;' src='{{ asset('storage/'.$menara->foto) }}'><br><b>{{ $menara->menara }}</b><br>{{ $menara->alamat }}<br><a class='btn btn-success mb-1 p-1' href='/lihat/{{ $menara->mid }}'>Detail</a> <a class='btn btn-warning mb-1 p-1' href='/rute/{{ $menara->id }}'>Rute</a>");
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

   
     function onLocationFound(e) {
		const radius = e.accuracy / 2;

		const locationMarker = L.marker(e.latlng).addTo(map)
			.bindPopup(`Lokasi Anda`).openPopup();

            L.Routing.control({
                waypoints: [
                    L.latLng(e.latlng),
                    @foreach($tampil as $menara)
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

	map.locate({setView: true, maxZoom: 20});  
</script>
@endsection