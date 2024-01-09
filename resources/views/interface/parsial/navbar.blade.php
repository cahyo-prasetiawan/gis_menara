<header class="header" id="header">
    <nav class="nav container">          
        <a href="/home" class="nav__logo"> <img src="{{ asset('logo.png') }}" style="width:35px;" > E - Menara X {{  Auth::user()->provider->name }}</a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="/home" class="nav__link {{ Request::is('home*') ? 'active-link ' : '' }}">
                        <i class='bx bx-home-alt nav__icon'></i>
                        <span class="nav__name">Home</span>
                    </a>
                </li>
                

                <li class="nav__item">
                    <a href="/halmenara" class="nav__link {{ Request::is('halmenara*') ? 'active-link ' : '' }}">
                        <i class='bx bx-book-alt nav__icon'></i>
                        <span class="nav__name">Menara</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="/halretribusi" class="nav__link {{ Request::is('halretribusi*') ? 'active-link ' : '' }}">
                        <i class='bx bx-briefcase-alt nav__icon'></i>
                        <span class="nav__name">Retribusi</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="/kontak" class="nav__link {{ Request::is('kontak*') ? 'active-link ' : '' }}">
                        <i class='bx bx-message-square-detail nav__icon'></i>
                        <span class="nav__name">Laporan</span>
                    </a>
                </li>

                {{-- <li class="nav__item">
                    <a href="#about" class="nav__link">
                      <img src="{{ asset('../assets/img/avatars/1.png') }}" alt="{{ Auth::guard('pengguna')->user()->name }}" class="nav__img">
                        <span class="nav__name">About</span>
                    </a>
                </li> --}}
                <div class="nav__item dropdown">
                   
                    <a href="#" class="nav__link dropdown-toggle" data-bs-toggle="dropdown"> <img src="{{ asset('storage/'.Auth::user()->image) }}" alt="" class="rounded" style="width: 30px;"></a>
                    <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">
                        <a href="/akun" class="dropdown-item"><i class="bx bx-user "></i> My Profile</a>
                        <form action="/logout" method="POST">
                            @csrf
                          <button class="dropdown-item" type="submit"> <i class="bx bx-power-off "></i> <span class="align-middle">Log Out</span></button>
                          </form>
                    </div>
                </div>
            </ul>
        </div>
        
    </nav>
</header>
