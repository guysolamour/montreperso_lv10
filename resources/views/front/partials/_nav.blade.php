<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#page-top">{{ config('app.name') }}</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto my-2 my-lg-0">
                {{-- <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li> --}}
                @auth
                <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Tableau de bord</a></li>
                @else
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">S'inscrire</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Se connecter</a></li>
                @endauth

                {{-- @auth('admin') --}}
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Administration</a></li>
                {{-- @endauth --}}
            </ul>
        </div>
    </div>
</nav>
