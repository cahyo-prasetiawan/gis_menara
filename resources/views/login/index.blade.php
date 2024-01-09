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
              <h4 class="mb-2">Welcome to E-Menara!</h4>
              <p class="mb-4">Silakan Masuk Ke Akun Anda Dan Mulai Menggunakan Sistem</p>

              <form id="formAuthentication" class="mb-3" action="/" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="text"
                    class="form-control @error('email') is-invalid @enderror" 
                    id="email"
                    name="email"
                    placeholder="Masukkan Email Anda"
                    autofocus
                    required 
                    @if(Cookie::has('email')) value="{{ Cookie::get('email') }}"
                    @endif
                    />
                  @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="/lupapassword">
                      <small>Lupa Password?</small>
                    </a>
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
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember" name="remember"  @if(Cookie::has('email')) checked @endif/>
                    <label class="form-check-label" for="remember-me"> Ingat Saya </label>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Masuk</button>
                </div>
              </form>

            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    @endsection
