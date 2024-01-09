<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('../assets/') }}"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" >
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    >

    <title>Cetak
    </title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('../logo.png') }}" />

    <!-- Fonts -->
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

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('../assets/vendor/libs/apex-charts/apex-charts.css') }}" />
   <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

   <!-- script chart -->
   <script src="{{ asset('..\assets\js\highchart.js') }}"></script>

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('../assets/vendor/css/pages/page-auth.css') }}" />
    <!-- Helpers -->
    <script src="{{ asset('../assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('../assets/js/config.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('../assets/css/loading.css') }}" />

 
</head>

<body>

  
  <!-- Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  
  <!-- Content -->



    <div class="row invoice-preview" style="background-color:white;">
        <!-- Invoice -->
        <div class="col-xl-8 col-md-8 col-12 mb-md-0 mb-4">
          <div class="card invoice-preview-card">
            <div class="card-body" style="padding-bottom:0px;">
                <table>
                    <tbody >
                        <tr class="mb-xl-0 mb-1">
                            <td colspan="12" class="align-top px-1 py-1">
                                <div class="mb-xl-0 mb-4" style="width:430px;">
                                    <div class="d-flex svg-illustration mb-3 gap-2">
                                      <span class="app-brand-logo demo">
                                          <img src="{{ asset('logo.png') }}" style="width:50px;" alt="">
                                      </span>
                                      <span class="app-brand-text demo text-body fw-bolder"  style="text-transform: capitalize;">Diskominfo</span>
                                    </div>
                                    <p class="mb-1">Jl. RM. Thaher No. 503 Muara Bungo 37214</p>
                                    <p class="mb-1">Email :info@bungokab.go.id</p>
                                    <p class="mb-0">Telp : 0747-21016</p>
                                  </div>
                           
                            </td>
                            
                            <td colspan="30" class="text-end px-1 py-1">
                                <div>
                                    
                                    <h4>Laporan #{{ $tahun }}</h4>
                                   
                                  </div>
                            </td>
                          </tr>
                    </tbody>
                </table>
            </div>
            <hr class="my-0" />
            <div class="card-body" style="padding-bottom:1px; padding-top:2px;">
              <div class="row p-sm-1 p-0">
                <div class="col-xl-12 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-0">
                  <h6 class="pb-0">Provider:</h6>
                  <p class="mb-1">{{ $pemilik->name }}</p>
                  <p class="mb-0">{{ $pemilik->alamat }}</p>
                
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table border-top m-0" style=" font-size: 0.875em;">
                <thead>
                  <tr >
                    <th  style=" font-size: 0.875em;"style=" font-size: 0.875em;">No</th>
                    <th style=" font-size: 0.875em;">Nama Menara</th>
                    <th>Kecamatan</th>
                    <th>Alamat</th>
                    <th>Jenis Menara</th>
                    <th>Tagihan</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    function rupiah($angka)
                {
                    // $prefix = $prefix ? $prefix : 'Rp. ';
                    // $nominal = $this->attributes[$field];
                    // return $prefix . number_format($nominal, 0, ',', '.');
                    $hasil = "Rp. " . number_format($angka, '2', ',' , '.');
                    return $hasil;
                }
                ?>
                  @if(count($menara)>0)
                    @foreach ($menara as $menara)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $menara->nama}}</td>
                    <td>{{ $menara->knama }}</td>
                    <td>{{ $menara->alamat }}</td>
                    <td style="text-center">{{ $menara->jnama }} Kaki</td>
                 
                    <td>{{ rupiah($menara->tarif) }}</td>
                  </tr>
                  @endforeach
                  @else
                  <td colspan="6">
                   <h5 class="text-center">Tidak ada data</h5>
                  </td>
                 @endif
                  <tr>
                    
                   
                    <td class="text-end px-4 py-1" colspan="4">
                      <p class="mb-0">Total: </p>
                    </td>
                    <td colspan="2" class="px-4 py-1">
                      <p class="fw-semibold mb-0"> {{ rupiah($total) }}</p>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
      
            <div class="card-body">
              <div class="row">
                <div class="col-12 text-end" style="padding-right:80px;">
                  <span class="fw-semibold">Muara Bungo, {{ $sekarang  }}</span><br>
                 
                </div>

                <div class="col-4 mt-1 text-center">
                  <span class="fw-semibold ">Yang Menerima </span><br><br><br><br>
                  <span>(...........................)</span>
                </div>
                <div class="col-2 mt-1 text-center">
                </div>
                <div class="col-6 mt-1 text-center">
                  <span class="fw-semibold">Plt. Kepala Dinas Kominfo dan Persandian Kabupaten Bungo</span><br><br><br>
                  <span style=" text-decoration: underline;">Zainadi, S.Pd,MM</span><br
                  <span>NIP. 19710612 199502 1001</span>
                </div>

              </div>
            </div>

         
          </div>
        </div>
   
      
                  
                </div>
                <!-- / Content -->
                <script type="text/javascript">
                    window.print();
                </script>

                <script src="{{ asset('../assets/vendor/libs/jquery/jquery.js') }}"></script>
                <script src="{{ asset('../assets/vendor/libs/popper/popper.js') }}"></script>
                <script src="{{ asset('../assets/vendor/js/bootstrap.js') }}"></script>
                <script src="{{ asset('../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
            
                <script src="{{ asset('../assets/vendor/js/menu.js') }}"></script>
                <!-- endbuild -->
            
                <!-- Vendors JS -->
                <script src="{{ asset('../assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
            
                <!-- Main JS -->
                <script src="{{ asset('../assets/js/main.js') }}"></script>
            
                <!-- Page JS -->
                <script src="{{ asset('../assets/js/dashboards-analytics.js') }}"></script>
            
                <!-- Place this tag in your head or just before your close body tag. -->
                <script async defer src="https://buttons.github.io/buttons.js"></script>
              </body>
            </html>
            
 

<!-- beautify ignore:end -->

