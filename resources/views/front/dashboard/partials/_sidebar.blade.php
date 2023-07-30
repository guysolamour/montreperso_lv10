<!--
  ====================================
  ——— LEFT SIDEBAR WITH FOOTER
  =====================================
-->
<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="{{ route('dashboard') }}" title="{{ config('app.name') }}">
                <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30"
                    height="33" viewBox="0 0 30 33">
                    <g fill="none" fill-rule="evenodd">
                        <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                        <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                    </g>
                </svg>
                <span class="brand-name text-truncate">{{ config('app.name') }}</span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar">

            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <li class="active">
                    <a class="sidenav-item-link" href="{{ route('home') }}" >
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Tableau de bord</span> <b class="caret"></b>
                    </a>
                </li>

                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#app"
                        aria-expanded="false" aria-controls="app">
                        <i class="mdi mdi-folder-multiple-outline"></i>
                        <span class="nav-text">Mon compte</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="app" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="{{ front_route('dashboard.profile.edit') }}">
                                    <span class="nav-text">Editer mon profil</span>

                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="{{ front_route('dashboard.password.change') }}">
                                    <span class="nav-text">Changer mon mot de passe</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>

            </ul>

        </div>

        <div class="sidebar-footer">
            <hr class="separator mb-0" />
            <div class="sidebar-footer-content">
                <h6 class="text-center">
                    {{ auth()->user()->name }}
                </h6>
                <h6 class="text-center">
                   <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-danger btn-block">Déconnexion</a>
                </h6>
            </div>
        </div>
    </div>
</aside>
