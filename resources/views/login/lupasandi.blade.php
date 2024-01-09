@extends('layouts.Headlogin')

@section('content')
   
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner py-4">
        <!-- Forgot Password -->

        <div id="flash" data-flash="{{ session('status') }}"> </div>
        <div id="flash1" data-flash="{{ session('email') }}"> </div>

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
            <h4 class="mb-2">Lupa Sandi? 🔒</h4>
            <p class="mb-4">Masukkan email yang terdaftar untuk merubah password.</p>
            <form id="formAuthentication" class="mb-3" action="{{ route('password.email') }}" method="POST">
              @csrf
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                  type="text"
                  class="form-control @error('email') is-invalid @enderror" 
                  id="email"
                  name="email"
                  placeholder="Enter your email"
                  autofocus
                  required
                />
                @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <button class="btn btn-primary d-grid w-100">Send Reset Link</button>
            </form>
            <div class="text-center">
              <a href="/" class="d-flex align-items-center justify-content-center">
                <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                Back to login
              </a>
            </div>
          </div>
        </div>
        <!-- /Forgot Password -->
      </div>
    </div>
  </div>

    @endsection
