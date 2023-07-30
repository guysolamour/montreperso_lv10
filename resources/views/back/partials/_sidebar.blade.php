
<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="{{ route(config('administrable.guard') . '.dashboard') }}">
            {{-- <div class="logo-img">
                <img src="{{ config('administrable.logo_url') }}" class="header-brand-img" alt="{{ config('app.name') }}">
            </div> --}}
            <span class="text">{{ config('app.name') }}</span>
        </a>
        <button type="button" class="nav-toggle"><i data-toggle="expanded"
                class="ik ik-toggle-right toggle-icon"></i></button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-lavel">Menu</div>
                <div class="nav-item {{ set_active_link(config('administrable.guard') . '.dashboard') }}">
                    <a href="{{ route(config('administrable.guard') . '.dashboard') }}"><i class="ik ik-bar-chart-2"></i><span>Tableau de bord</span></a>
                </div>
                {{-- insert sidebar links here --}}


                @php
                $countCommentNotifications = get_guard()->unreadNotifications->filter(fn($item) => $item->type === config('administrable.modules.comment.back.notification'))->count();
                @endphp
                <div class="nav-item">
                    <a href="{{ back_route('comment.index') }}">
                        <i class="fa fa-comments"></i>
                        <span>
                            Commentaires
                            @if($countCommentNotifications)
                            <span class="badge badge-success">{{ $countCommentNotifications }}</span>
                            @endif
                        </span>
                    </a>
                </div>

                {{--  insert extensions links here  --}}

                <div class="nav-item">
                    <a href="{{ back_route('user.index') }}">
                        <i class="fa fa-user"></i><span>Utilisateurs</span>
                    </a>
                </div>
                <div class="nav-item has-sub">
                    <a href="javascript:void(0)"><i class="fa fa-users"></i><span>Admins</span></a>
                    <div class="submenu-content">
                        <a href="{{ back_route(config('administrable.guard') . '.index') }}" class="menu-item {{ set_active_link(back_route_path(config('administrable.guard') . '.index')) }}">Liste</a>
                        <a href="{{ back_route(config('administrable.guard') . '.profile', get_guard()) }}" class="menu-item {{ set_active_link(back_route_path(config('administrable.guard') . '.profile')) }}">Mon profil</a>
                        @if (get_guard()->can('create-' . config('administrable.guard')))
                        <a href="{{ back_route(config('administrable.guard') . '.create') }}" class="menu-item {{ set_active_link(back_route_path(config('administrable.guard') . '.create')) }}">Ajouter</a>
                        @endif
                    </div>
                </div>

                <div class="nav-item">
                    <a href="{{ back_route('page.index') }}">
                        <i class="fa fa-folder"></i><span>Pages</span>
                    </a>
                </div>

                <div class="nav-item">
                    <a href="{{ back_route('configuration.edit') }}">
                        <i class="fa fa-tools"></i><span>Configuration</span>
                    </a>
                </div>
            </nav>
        </div>
    </div>
</div>
