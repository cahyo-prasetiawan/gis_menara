@extends('layouts.Headlogin')

@section('content')
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">

           <div id="flash" data-flash="{{ session('success') }}"> </div>
           <div id="flash1" data-flash="{{ session('LoginError') }}"> </div>
       
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="/" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                   <img src="logo.png" alt="" width="50">
                  </span>
                  <span class="app-brand-text demo text-body fw-bolder" style="text-transform: capitalize;">Diskominfo Bungo</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Reset Password! 👋</h4>
              <p class="mb-4">Silakan Masuk Ke Akun Anda Dan Mulai Menggunakan Sistem</p>

              <form id="formAuthentication" class="mb-3" action="" method="POST">
                {{ method_field('PUT') }}
                @csrf
                <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                      <label class="form-label" for="password">Email</label>
                    </div>
                    <div class="input-group input-group-merge">
                      <input
                        type="email"
                        id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email"
                        placeholder=""
                        value="{{ Session::get('email') ? Session::get('email') : old('email') }}"
                      />
                      @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">New Password</label>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control @error('password') is-invalid @enderror"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                      @if(Cookie::has('pass')) value="{{ Cookie::get('pass') }}"
                      @endif
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Reset Password</button>
                </div>
              </form>

            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    @endsection
