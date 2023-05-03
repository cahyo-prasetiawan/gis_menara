@extends ('layouts.main')

@section('content')
        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            {{ Breadcrumbs::render('myprofile') }}

            @if (session()->has('ksuccess'))
            <div class="alert alert-primary col-lg-12" role="alert">
              {{ session('ksuccess') }}
            </div>  
            @endif
            <div class="row">
              <div class="col-md-12">
                <div class="card mb-4">
                  <h5 class="card-header">Profile Details</h5>
                  <!-- Account -->
                  <div class="card-body">
                    <form action="/profile/{{ Auth::user()->id }}/edit" method="POST" enctype="multipart/form-data">
                      {{ method_field('PUT') }}
                      @csrf
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                      @if(Auth::user()->image == '')
                      <img class="img-preview img-fluid mb-3 " >   
                      @else
                      <img
                      src="{{ asset('storage/'.Auth::user()->image) }}"
                      alt="user-avatar"
                      class="img-preview img-fluid mb-3 Rounded"    
                      height="100"
                      width="100"
                      id="uploadedAvatar"
                    />
                    @endif
                      <div class="button-wrapper"> 
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                          <span class="d-none d-sm-block">Ganti Foto</span>
                          <i class="bx bx-upload d-block d-sm-none"></i>
                          <input
                            type="file"
                            id="upload"
                            name="image"
                            hidden
                            class="account-file-input @error('image') is-invalid @enderror"
                            accept="image/png, image/jpeg"
                            onchange="previewImage()"
                          />
                        </label>
                        <p class="text-muted mb-0">Hanya Format JPG, GIF Atau PNG. Kapasistas Maksimal 800Kb</p>
                      </div>
                      @error('image')
                      <div class="invalid-feedback">
                      {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                  <hr class="my-0" />
                  <div class="card-body">
                      <div class="row">
                        <div class="mb-3 col-md-6">
                          <label for="name" class="form-label">Nama</label>
                          <input
                            class="form-control @error('name') is-invalid @enderror"
                            type="text"
                            id="name"
                            name="name"
                            value="{{ Auth::user()->name }}"
                          />
                          @error('name')
                          <div class="invalid-feedback">
                          {{ $message }}
                          </div>
                          @enderror
                        </div>
                       
                        <div class="mb-3 col-md-6">
                          <label for="email" class="form-label">E-mail</label>
                          <input
                            class="form-control  @error('email') is-invalid @enderror"
                            type="text"
                            id="email"
                            name="email"
                            value="{{ Auth::user()->email }}"
                            placeholder="john.doe@example.com"
                          />
                          @error('email')
                          <div class="invalid-feedback">
                          {{ $message }}
                          </div>
                          @enderror
                        </div>
                    
                        <div class="card accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button
                              type="button"
                              class="accordion-button collapsed"
                              data-bs-toggle="collapse"
                              data-bs-target="#accordionTwo"
                              aria-expanded="false"
                              aria-controls="accordionTwo"
                            >
                              Ganti Username dan Password
                            </button>
                          </h2>
                          <div
                            id="accordionTwo"
                            class="accordion-collapse collapse"
                            aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample"
                          >
                            <div class="accordion-body">
                              <div class="row mt-2">
                              <div class="mb-3 col-md-6">
                                <label for="username" class="form-label">Username</label>
                                <input class="form-control" type="text" name="username" id="username" value="{{ Auth::user()->username }}"/>
                                @error('username')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                                @enderror
                              </div>
                              <div class="mb-3 col-md-6 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                  <label class="form-label" for="password">Password</label>
                                </div>
                                <div class="input-group input-group-merge">
                                  <input
                                    type="password"
                                    id="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password"
                                    
                                  />
                                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                  @error('password')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                  @enderror
                                </div>
                              </div>
                            </div>
                            </div>
                          </div>

                        </div>
                      </div>
                      <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                      </div>
                    </form>
                  </div>
                  <!-- /Account -->
                </div>
              
              </div>
            </div>
          </div>
          
          <div class="content-backdrop fade"></div>
        </div>
        <script>
          function previewImage()
         {
         const image = document.querySelector('#image');
         const imgPreview = document.querySelector('.img-preview');

         imgPreview.style.display = 'block';

         const oFReader = new FileReader();
         oFReader.readAsDataURL(image.files[0]);

         oFReader.onload = function(oFREvent) {
           imgPreview.src = oFREvent.target.result;
         }
         }
       </script>
 @endsection