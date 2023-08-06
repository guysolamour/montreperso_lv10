<header class="header-top" header-theme="light">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div class="top-menu d-flex align-items-center">
                <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                <div class="header-search">
                    <div class="input-group">
                        <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                        <input type="text" class="form-control">
                        <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                    </div>
                </div>
                <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
            </div>
            <div class="top-menu d-flex align-items-center">
                {{-- Insert Mailbox Link --}}

                @php
                    $unreadNotifications = get_guard()->unreadNotifications;
                @endphp
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="notiDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell text-secondary" ></i>
                        @if($unreadNotifications->count())
                        <span class="badge bg-success">{{ $unreadNotifications->count() }}</span></a>
                        @endif
                    <div class="dropdown-menu dropdown-menu-right notification-dropdown" aria-labelledby="notiDropdown">
                        <h4 class="header">Notifications</h4>
                        @forelse($unreadNotifications as $notification)
                            @if($notification->type === config('administrable.modules.comment.back.notification'))
                            <div class="notifications-wrap">
                                <a href="{{ back_route('comment.show', $notification->data['comment']['id']) }}" class="media">
                                    <span class="media-body">
                                        <span class="media-content">
                                            Un commentaire vient d'être déposé sur le site,
                                            par <b>{{ $notification->data['commenter_name'] }}</b>
                                            joignable à l'adresse <b>{{ $notification->data['commenter_email'] }}</b>.
                                        </span>
                                    </span>
                                </a>
                            </div>
                            @endif
                        <div class="footer" ><a style="font-size: 14px;" href="{{ back_route('notification.markasread') }}"><i class="fa fa-check-double"></i> Tous marquer comme lues</a></div>
                        @empty
                        <div class="notifications-wrap">
                            <a href="#" class="media">
                                <span class="media-body">
                                    {{--  <span class="heading-font-family media-heading">{{ $message->name }}</span> --}}
                                <span class="media-content">
                                    Pas de notifications pour l'instant
                                </span>
                                </span>
                            </a>
                        </div>
                        @endforelse
                    </div>
                </div>
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="ik ik-plus"></i></a>
                    <div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top"
                            title="Tableau de bord"><i class="ik ik-bar-chart-2"></i></a>

                        @if (Route::has(back_route_path('extensions.mailbox.mailbox.index')))
                        <a class="dropdown-item" href="{{ back_route('extensions.mailbox.mailbox.index') }}" data-toggle="tooltip"
                          data-placement="top" title="Messagerie"><i class="ik ik-mail"></i></a>
                        @endif

                        <a class="dropdown-item" href="{{ back_route('admin.index') }}" data-toggle="tooltip"
                          data-placement="top" title="Administrateurs"><i class="ik ik-users"></i></a>

                        @if (Route::has(back_route_path('extensions.blog.post.index')))
                        <a class="dropdown-item" href="{{ back_route('extensions.blog.post.index') }}" data-toggle="tooltip"
                          data-placement="top" title="Articles"><i class="fas fa-swatchbook"></i></a>
                        @endif

                        @if (Route::has(back_route_path('extensions.testimonial.testimonial.index')))
                        <a class="dropdown-item" href="{{ back_route('extensions.testimonial.testimonial.index') }}" data-toggle="tooltip"
                          data-placement="top" title="Témoignages"><i class="fas fa-comments-alt"></i></a>
                        @endif

                        @if (Route::has(back_route_path('extensions.blog.category.index')))
                        <a class="dropdown-item" href="{{ back_route('extensions.blog.category.index') }}" data-toggle="tooltip"
                          data-placement="top" title="Catégories"><i class="far fa-folder-open"></i></a>
                        @endif

                        <a class="dropdown-item" href="{{ back_route('configuration.edit') }}" data-toggle="tooltip" data-placement="top"
                            title="Configuration"><i class="fa fa-tools"></i></a>

                    </div>
                </div>
                <button type="button" class="nav-link ml-10" id="apps_modal_btn" data-toggle="modal"
                    data-target="#appsModal"><i class="ik ik-grid"></i></button>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><img class="avatar" data-avatar="{{ get_guard('id') }}"
                            src="{{ get_guard()->getFrontImageUrl() }}" alt="{{ get_guard('full_name') }}"></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ back_route('admin.profile', get_guard()) }}"><i class="ik ik-user dropdown-icon"></i>
                            Profile</a>
                            <a class="dropdown-item" href="{{ back_route('admin.index') }}"><i class="ik ik-users dropdown-icon"></i>
                                Administrateurs</a>
                        <a class="dropdown-item" href="{{ back_route('configuration.edit') }}"><i class="ik ik-settings dropdown-icon"></i>
                            Configuration</a>

                        <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('admin-logout-form').submit();"><i class="ik ik-power dropdown-icon"></i>
                            Déconnexion</a>
                        <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                            @honeypot
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>

<div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel"
  aria-hidden="true" data-backdrop="false">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ik ik-x-circle"></i></button>
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body d-flex align-items-center">
        <div class="container">
          <div class="apps-wrap">
            <div class="app-item">
              <a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i><span>Tableau de bord</span></a>
            </div>

            @if (Route::has(back_route_path('extensions.mailbox.mailbox.index')))
            <div class="app-item">
              <a href="{{ back_route('extensions.mailbox.mailbox.index') }}"><i class="fa fa-envelope"></i><span>{{ Lang::get('administrable-mailbox::translations.label') }}</span></a>
            </div>
            @endif

            <div class="app-item">
              <a href="{{ back_route('admin.index') }}"><i class="fa fa-users"></i><span>Admins</span></a>
            </div>

            @if (Route::has(back_route_path('extensions.blog.post.index')))
            <div class="app-item">
              <a href="{{ back_route('extensions.blog.post.index') }}"><i class="fa fa-swatchbook"></i><span>Articles</span></a>
            </div>
            @endif

            @if (Route::has(back_route_path('extensions.blog.category.index')))
            <div class="app-item">
              <a href="{{ back_route('extensions.blog.category.index') }}"><i class="fa fa-folder-open"></i><span>Catégories</span></a>
            </div>
            @endif

            @if (Route::has(back_route_path('extensions.testimonial.testimonial.index')))
            <div class="app-item">
              <a href="{{ back_route('extensions.testimonial.testimonial.index') }}"><i class="fa fa-comments-alt"></i><span>{{ Lang::get('administrable-testimonial::translations.label') }}</span></a>
            </div>
            @endif

            <div class="app-item">
              <a href="{{ back_route('configuration.edit') }}"><i class="fa fa-tools"></i><span>Configuration</span></a>
            </div>

            {{-- add megamenu Link here --}}
    <!-- watch link -->
    <div class="app-item">
        <a href="{{ route('back.watch.index') }}">
            <i class="fa fa-folder"></i><span>Watches</span>
        </a>
    </div>
    <!-- end watch link -->
    <!-- designcategory link -->
    <div class="app-item">
        <a href="{{ route('back.designcategory.index') }}">
            <i class="fa fa-folder"></i><span>DesignCategories</span>
        </a>
    </div>
    <!-- end designcategory link -->
    
    
    <!-- design link -->
    <div class="app-item">
        <a href="{{ route('back.design.index') }}">
            <i class="fa fa-folder"></i><span>Designs</span>
        </a>
    </div>
    <!-- end design link -->
    <!-- bracelet link -->
    <div class="app-item">
        <a href="{{ route('back.bracelet.index') }}">
            <i class="fa fa-folder"></i><span>Bracelets</span>
        </a>
    </div>
    <!-- end bracelet link -->
    <!-- type link -->
    <div class="app-item">
        <a href="{{ route('back.type.index') }}">
            <i class="fa fa-folder"></i><span>Types</span>
        </a>
    </div>
    <!-- end type link -->
    <!-- font link -->
    <div class="app-item">
        <a href="{{ route('back.font.index') }}">
            <i class="fa fa-folder"></i><span>Fonts</span>
        </a>
    </div>
    <!-- end font link -->
    <!-- background link -->
    <div class="app-item">
        <a href="{{ route('back.background.index') }}">
            <i class="fa fa-folder"></i><span>Backgrounds</span>
        </a>
    </div>
    <!-- end background link -->
    <!-- form link -->
    <div class="app-item">
        <a href="{{ route('back.form.index') }}">
            <i class="fa fa-folder"></i><span>Forms</span>
        </a>
    </div>
    <!-- end form link -->
    <!-- index link -->
    <div class="app-item">
        <a href="{{ route('back.index.index') }}">
            <i class="fa fa-folder"></i><span>Indices</span>
        </a>
    </div>
    <!-- end index link -->
    <!-- indicator link -->
    <div class="app-item">
        <a href="{{ route('back.indicator.index') }}">
            <i class="fa fa-folder"></i><span>Indicators</span>
        </a>
    </div>
    <!-- end indicator link -->
    

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
