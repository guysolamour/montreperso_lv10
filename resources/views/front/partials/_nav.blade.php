<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">Montre perso</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
           {{-- @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">Tableau de bord</a>
            </li> --}}
            @guest
            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">S'inscrire</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Se connecter</a></li>
            @endguest
          {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li> --}}
          {{-- <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li> --}}
        </ul>
        <div class="d-flex">
            @auth
            <button class="btn btn-outline-success">Tableau de bord</button>
            <button class="btn btn-danger" type="submit" form="logout-form">logout</button>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    @honeypot
                </form>
            @endauth
        </div>
      </div>
    </div>
  </nav>

{{--

<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#page-top">{{ config('app.name') }}</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto my-2 my-lg-0">
                 <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                @auth
                <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Tableau de bord</a></li>
                @else
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">S'inscrire</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Se connecter</a></li>
                @endauth

                 @auth('admin')
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Administration</a></li>
                 @endauth
            </ul>
        </div>
    </div>
</nav> --}}
