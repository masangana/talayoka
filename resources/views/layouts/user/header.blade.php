
<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
    <div class="header-body">
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo">
                            @auth
                                <a href="{{ url('/home') }}">
                                    <img alt="Porto" width="100" height="48" data-sticky-width="82" data-sticky-height="40" src="{{asset ('assets/user/img/logo-default-slim.png')}}">
                                </a>
                            @else
                                <a href="{{ url('/') }}">
                                    <img alt="Porto" width="100" height="48" data-sticky-width="82" data-sticky-height="40" src="{{asset ('assets/user/img/logo-default-slim.png')}}">
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row">
                        <div class="header-nav header-nav-line header-nav-top-line header-nav-top-line-with-border order-2 order-lg-1">
                            <div class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">
                                        <li class="dropdown">
                                            @auth
                                                <a class="dropdown-item dropdown-toggle"
                                                        @if(Route::current()->getName() == 'home')
                                                            active
                                                        @endif
                                                        href="{{ Route('home') }}">
                                                    Home
                                                </a>
                                            @else
                                                <a class="dropdown-item dropdown-toggle"
                                                        @if(Route::current()->getName() == 'welcome')
                                                                    active
                                                                @endif
                                                        href="{{ Route('welcome') }}">
                                                    Home
                                                </a>
                                            @endauth
                                        </li>
                                        <li class="dropdown dropdown-mega">
                                            <a class="dropdown-item dropdown-toggle 
                                                @if(Route::current()->getName() == 'serie.index')
                                                    active
                                                @endif
                                                " href="{{Route('serie.index')}}">
                                                Séries
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle 
                                                @if(Route::current()->getName() == 'movie.index')
                                                    active
                                                @endif" 
                                                href="{{Route('movie.index')}}">
                                                Films
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle" href="#">
                                                Musiques
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle" href="#">
                                                Vidéos
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle" href="#">
                                                Lives
                                            </a>
                                        </li>
                                        @auth
                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle
                                                    @if(Route::current()->getName() == 'user.profile')
                                                        active
                                                    @endif"
                                                    href="{{Route('user.profile')}}">
                                                    Profile
                                                </a>
                                            </li>
                                        @endauth
                                    </ul>
                                </nav>
                            </div>
                            <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>

                        @guest
                            <div class="header-nav-features header-nav-features-no-border header-nav-features-lg-show-border order-1 order-lg-2">
                                <div class="header-nav-feature header-nav-features-user d-inline-flex mx-2 pe-2 signin" id="headerAccount">
                                    <a href="{{Route('login')}}" class="dropdown-item" aria-label="">
                                        <i class="far fa-user"></i> Sign In
                                    </a>
                                </div>
                            </div>
                        @else
                        <div class="header-nav-features header-nav-features-no-border header-nav-features-lg-show-border order-1 order-lg-2">
                            <div class="header-nav-feature header-nav-features-user d-inline-flex mx-2 pe-2 signin" id="headerAccount">
                                <a href="{{ route('logout') }}" 
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                                    class="header-nav-features-toggle" aria-label="">
                                    <i class="far fa-user"></i> Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>