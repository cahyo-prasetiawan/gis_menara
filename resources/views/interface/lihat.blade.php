@extends('interface.parsial.main')

@section('content')


<!-- Page Header Start -->

<!-- Page Header End -->
<!-- Service Start -->
<div class="container-xxl py-5 flex-grow-1 wow fadeIn" data-wow-delay="0.1s" >
   <div class="container">
   
       <div class="card mb-4">
        <br>
        <h5 class="card-header">Detail Data</h5>
        <a href="/home" class="btn btn-primary">Kembali</a>
        <div class="card-body">
          <div class="row">
            <!-- Custom content with heading -->
            <div class="col-lg-6 mb-4 mb-xl-0">
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
                    
                      <!--/ List group Icons -->
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
                 
              </div>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <small class="text-light fw-semibold">Lokasi</small>

              <div class="demo-inline-spacing mt-1">
                <a class="btn btn-primary btn-block" href="/rute/{{ $menara->id }}" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true" title="" data-bs-original-title=" <span>Ketuk Untuk Ke Menara</span>">Ke Menara</a>
           
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
</div>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin=""></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>  
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>     
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

     



</script>
   @endsection



