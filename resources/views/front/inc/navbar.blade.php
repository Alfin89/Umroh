<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="{{ url('/') }}" class="logo me-3"><img src="{{ asset('assets/front/img/logo.jpeg') }}" alt="" class="img-fluid"></a>
      <h1 class="logo me-auto"><a href="{{ url('/') }}">Arfa Travel & Tour</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->


      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="active" href="{{ url('/') }}">Beranda</a></li>
          <li><a href="{{ url('daftar-paket') }}">Paket Umroh</a></li>
          <li><a href="{{ url('image') }}">Galeri</a></li>

          <li class="dropdown"><a href="#"><span>Selengkapnya</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
               @if (Route::has('login'))
              <li>
                @auth
                    <a href="{{ url('/dashboard') }}" >Dashboard</a>
                  @else
                    <a href="{{ route('login') }}">Log in</a>

                    @if (Route::has('register'))
                      <a href="{{ route('register') }}" >Register</a>
                    @endif
                  @endauth
              </li>
              @endif
            </ul>
          </li>
          <li><a href="{{ url('cekdata') }}">Cek Data</a></li>
          <li><a href="{{ url('contact') }}">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>

  {{-- @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" >Home</a>
                    @else
                        <a href="{{ route('login') }}">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" >Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}