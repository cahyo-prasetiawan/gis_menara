<nav
class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
id="layout-navbar"
>
<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
  <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
    <i class="bx bx-menu bx-sm"></i>
  </a>
</div>

<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
  <!-- Search -->
  <div class="navbar-nav align-items-center">
    <div class="nav-item d-flex align-items-center">
     
    </div>
  </div>
  <!-- /Search -->

  <ul class="navbar-nav flex-row align-items-center ms-auto">
    <!-- Place this tag where you want the button to render. -->
    <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
      <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
        <i class="bx bx-bell bx-sm"></i>
        @if( auth()->user()->unreadNotifications->count() > 0)
        <span class="badge bg-danger rounded-pill badge-notifications">{{ auth()->user()->unreadNotifications->count() }}</span>
        @else
        @endif
      </a>
      <ul class="dropdown-menu dropdown-menu-end py-0">
        <li class="dropdown-menu-header border-bottom">
          <div class="dropdown-header d-flex align-items-center py-3">
            <h5 class="text-body mb-0 me-auto">Notification</h5>
            @if(auth()->user()->unreadNotifications->count() > 0)
            <a href="/readAll" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Mark all as read" data-bs-original-title="Mark all as read"><i class="bx fs-4 bx-envelope-open"></i></a>
            @else

            @endif
          </div>
        </li>
        @if(Auth::user()->role == '0')
        @foreach(auth()->user()->unreadNotifications as $notification)
        <li class="dropdown-notifications-list scrollable-container ps">
          <ul class="list-group list-group-flush">
            <li class="list-group-item list-group-item-action dropdown-notifications-item">
              <a href="{{ url($notification->data['url']. '?id='. $notification->id ) }}">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <h6 class="mb-1">{{ $notification->data['title'] }}</h6>
                  <p class="mb-0">{{ ucwords($notification->data['message']) }}</p>
                  <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                </div>
                <div class="flex-shrink-0 dropdown-notifications-actions">
                  {{-- "/read/{{ $notification->id }} --}}
                  <a href="" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                  <a href="" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                </div>

              </div>
              </a>
            </li>
          
          </ul>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>
        <div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></li>
        @endforeach
        @else
          @foreach(auth()->user()->unreadNotifications as $notification)
        <li class="dropdown-notifications-list scrollable-container ps">
          <ul class="list-group list-group-flush">
            <li class="list-group-item list-group-item-action dropdown-notifications-item">
              <a href="/read/{{ $notification->id }}">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <h6 class="mb-1">{{ $notification->data['title'] }}</h6>
                  <p class="mb-0">{{ ucwords($notification->data['message']) }}</p>
                  <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                </div>
                <div class="flex-shrink-0 dropdown-notifications-actions">
                  {{-- "/read/{{ $notification->id }} --}}
                  <a href="" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                  <a href="" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                </div>

              </div>
              </a>
            </li>
          </ul>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>
        <div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></li>
        @endforeach
        @endif
        @if(auth()->user()->unreadNotifications->count() > 0)
        <li class="dropdown-menu-footer border-top">
          <a href="javascript:void(0);" class="dropdown-item d-flex justify-content-center p-3">
            View all notifications
          </a>
        </li>
        @else
        <li class="dropdown-menu-footer border-top">
          <a href="javascript:void(0);" class="dropdown-item d-flex justify-content-center p-3">
            Tidak Ada Notifikasi
          </a>
        </li>
        @endif
      </ul>
    </li>

   
    
    <li class="nav-item navbar-dropdown dropdown-user dropdown">
      <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
        <div class="avatar avatar-online">
          @if(Auth::user()->image == '')
          <img src="{{ asset('../assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
          @else
          <img src="{{ asset('storage/'.Auth::user()->image) }}" alt class="w-px-40 h-40 rounded-circle" />
          @endif
        </div>
      </a>
      <ul class="dropdown-menu dropdown-menu-end">
        <li>
          <a class="dropdown-item" href="#">
            <div class="d-flex">
              <div class="flex-shrink-0 me-3">
                <div class="avatar avatar-online">
                  @if(Auth::user()->image == '')
                  <img src="{{ asset('../assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                  @else
                  <img src="{{ asset('storage/'.Auth::user()->image) }}" alt class="w-px-40 h-40 rounded-circle" />
                  @endif
                  </div>
              </div>
              <div class="flex-grow-1">
                @if (Str::length(Auth::guard('user')->user()) > 0)
                <span class="fw-semibold d-block">{{ Auth::guard('user')->user()->name }}</span>
                @elseif (Str::length(Auth::guard('pengguna')->user()) > 0)
                <span class="fw-semibold d-block">{{ Auth::guard('pengguna')->user()->name }}</span>
                @endif
                <small class="text-muted">Role</small> : 
                @if(Auth::user()->role == '1')
                <span class="badge rounded-pill bg-danger">Admin</span>
                @elseif(Auth::user()->role == '0')
                <span class="badge rounded-pill bg-info">Pegawai</span>
                @elseif(Auth::pengguna())
                <span class="badge rounded-pill bg-secondary">Proveider</span>
                @endif
              </div>
            </div>
          </a>
        </li>
        <li>
          <div class="dropdown-divider"></div>
        </li>
        <li>
          <a class="dropdown-item {{ Request::is('myprofile*') ? 'active' : '' }}" href="/myprofile"> 
            <i class="bx bx-user me-2"></i>
            <span class="align-middle">My Profile</span>
          </a>
        </li>
       
        
        <li>
          <div class="dropdown-divider"></div>
        </li>
        <li>
          <form action="/logout" method="POST">
            @csrf
          <button class="dropdown-item" type="submit"> <i class="bx bx-power-off me-2"></i> <span class="align-middle">Keluar</span></button>
          </form>
        </li>
      </ul>
    </li> 
  </ul>
</div>
</nav>