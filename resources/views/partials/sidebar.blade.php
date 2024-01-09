
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="#" class="app-brand-link">
        <span class="app-brand-logo demo">
             <img src="{{ asset('logo.png') }}" alt="" width="30">
            </span>
        <span class="app-brand-text demo menu-text fw-bolder ms-2" style="text-transform: capitalize;">Diskominfo</span>
      </a>
      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item {{ Request::is('dasboard*') ? 'active' : '' }}">
        <a href="/dasboard" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>
      <li class="menu-item {{ Request::is('peta*') ? 'active' : '' }}">
        <a href="/peta" class="menu-link">
          <i class="menu-icon tf-icons bx bx-pin"></i>
          <div data-i18n="Analytics">Peta Persebaran</div>
        </a>
      </li>

      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Management Akun</span>
      </li>
      @if(Auth::user()->role == '1')
      <li class="menu-item {{ Request::is('pegawai*') ? 'active' : '' }}">
        <a href="/pegawai" class="menu-link">
          <i class="menu-icon tf-icons bx bxs-user"></i>
          <div data-i18n="Basic">Akun Pegawai</div>
        </a>
      </li>
      @elseif(Auth::user()->role == '0')
      <li class="menu-item {{ Request::is('pengguna*') ? 'active' : '' }}">
        <a href="/pengguna" class="menu-link">
          <i class="menu-icon tf-icons bx bxs-user-detail"></i>
          <div data-i18n="Basic">Akun Provider</div>
        </a>
      </li>
      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Master Data</span>
      </li>
      <li class="menu-item {{ Request::is('kecamatan*') ? 'active' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
          <div data-i18n="Authentications">Data Khusus</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ Request::is('kecamatan*') ? 'active' : '' }}">
            <a href="/kecamatan" class="menu-link">
              <div data-i18n="Basic">Data Kecamatan</div>
            </a>
          </li>
          <li class="menu-item {{ Request::is('jenis*') ? 'active' : '' }}">
            <a href="/jenis" class="menu-link">
              <div data-i18n="Basic">Data Jenis Menara</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item {{ Request::is('provider*','menara*','retribusi*') ? 'active' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-broadcast"></i>
          <div data-i18n="Account Settings">Datail Provider</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ Request::is('provider*') ? 'active' : '' }}">
            <a href="/provider" class="menu-link">
              <div data-i18n="Account">Data Provider</div>
            </a>
          </li>
          <li class="menu-item {{ Request::is('menara*') ? 'active' : '' }}">
            <a href="/menara" class="menu-link">
              <div data-i18n="Notifications">Data Menara</div>
            </a>
          </li>
          <li class="menu-item {{ Request::is('retribusi*') ? 'active' : '' }}">
            <a href="/retribusi" class="menu-link">
              <div data-i18n="Connections">Data Retribusi</div>
            </a>
          </li>
        </ul>
      </li>
      @endif
      <!-- Components -->
      <li class="menu-header small text-uppercase"><span class="menu-header-text">Output</span></li>
      <!-- Cards -->
      <li class="menu-item {{ Request::is('pesan*') ? 'active' : '' }}">
        <a href="/pesan"  class="menu-link">
          <i class="menu-icon tf-icons bx bx-collection"></i>
          <div data-i18n="Basic">Pesan</div>
        </a>
      </li>
      <!-- User interface -->
      <li class="menu-item {{ Request::is('laporan*') ? 'active' : '' }}">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-box"></i>
          <div data-i18n="User interface">Laporan</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ Request::is('laporan*') ? 'active' : '' }}">
            <a href="/laporan" class="menu-link">
              <div data-i18n="Accordion">Retribusi</div>
            </a>
          </li>
        </ul>
      </li>

    

    
      
    </ul>
  </aside>