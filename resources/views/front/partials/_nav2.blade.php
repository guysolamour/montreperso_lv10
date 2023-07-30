<nav class="navbar navbar-expand-md navbar-dark bg-primary">
  <div class='container'>
    <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop" aria-controls="navbarTop" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTop">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item {{ set_active_link('home')  }}">
          <a class="nav-link" href="{{ route('home') }}">Accueil <span class="sr-only">(current)</span></a>
        </li>
        @if (Route::has('front.about.index'))
        <li class="nav-item {{ set_active_link('front.about.index')  }}">
          <a class="nav-link" href="{{ route('front.about.index') }}">A propos</a>
        </li>
        @endif

        {{-- insert extensions links here --}}

        @guest
        @if (Route::has('login'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Connexion</a>
        </li>
        @endif
        @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Inscription</a>
        </li>
        @endif
        @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            @if (Route::has('logout'))
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                    Déconnexion
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    @honeypot
                </form>
            </div>
            @endif
        </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
