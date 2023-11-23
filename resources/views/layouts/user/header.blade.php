
<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
    <div class="header-body">
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo">
                            <a href="index.html">
                                <img alt="Porto" width="100" height="48" data-sticky-width="82" data-sticky-height="40" src="img/logo-default-slim.png">
                            </a>
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
                                            <a class="dropdown-item dropdown-toggle" href="index.html">
                                                Home
                                            </a>
                                        </li>
                                        <li class="dropdown dropdown-mega">
                                            <a class="dropdown-item dropdown-toggle" href="elements.html">
                                                Séries
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle active" href="#">
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
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle" href="#">
                                                Profile
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                        <div class="header-nav-features header-nav-features-no-border header-nav-features-lg-show-border order-1 order-lg-2">
                            <div class="header-nav-feature header-nav-features-user d-inline-flex mx-2 pe-2 signin" id="headerAccount">
                                <a href="#" class="header-nav-features-toggle" aria-label="">
                                    <i class="far fa-user"></i> Sign In
                                </a>
                                <div class="header-nav-features-dropdown header-nav-features-dropdown-mobile-fixed header-nav-features-dropdown-force-right" id="headerTopUserDropdown">
                                    <div class="signin-form">
                                        <h5 class="text-uppercase mb-4 font-weight-bold text-3">Sign In</h5>
                                        <form>
                                            <div class="form-group">
                                                <label class="form-label mb-1 text-2 opacity-8">Email address* </label>
                                                <input type="email" class="form-control form-control-lg">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label mb-1 text-2 opacity-8">Password *</label>
                                                <input type="password" class="form-control form-control-lg">
                                            </div>
                                            <div class="row pb-2">
                                                <div class="form-group form-check col-lg-6 ps-1">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="rememberMeCheck">
                                                        <label class="form-label custom-control-label text-2" for="rememberMeCheck">Remember Me</label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-6 text-end">
                                                    <a class="text-uppercase text-1 font-weight-bold text-color-dark" id="headerRecover" href="#">LOST YOUR PASSWORD?</a>
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <div class="row">
                                                    <div class="col d-flex justify-content-end">
                                                        <a class="btn btn-primary" href="#">Login</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="extra-actions">
                                                <p>Don't have an account yet? <a href="#" id="headerSignUp" class="text-uppercase text-1 font-weight-bold text-color-dark">Sign Up</a></p>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="signup-form">
                                        <h5 class="text-uppercase mb-4 font-weight-bold text-3">Sign Up</h5>
                                        <form>
                                            <div class="form-group">
                                                <label class="form-label mb-1 text-2 opacity-8">Email address* </label>
                                                <input type="email" class="form-control form-control-lg">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label mb-1 text-2 opacity-8">Password *</label>
                                                <input type="password" class="form-control form-control-lg">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label mb-1 text-2 opacity-8">Re-enter Password *</label>
                                                <input type="password" class="form-control form-control-lg">
                                            </div>
                                            <div class="actions">
                                                <div class="row">
                                                    <div class="col d-flex justify-content-end">
                                                        <a class="btn btn-primary" href="#">Register</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="extra-actions">
                                                <p>Already have an account? <a href="#" id="headerSignIn" class="text-uppercase text-1 font-weight-bold text-color-dark">Log In</a></p>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="recover-form">
                                        <h5 class="text-uppercase mb-2 pb-1 font-weight-bold text-3">Reset My Password</h5>
                                        <p class="text-2 mb-4">Complete the form below to receive an email with the authorization code needed to reset your password.</p>

                                        <form>
                                            <div class="form-group">
                                                <label class="form-label mb-1 text-2 opacity-8">Email address* </label>
                                                <input type="email" class="form-control form-control-lg">
                                            </div>
                                            <div class="actions">
                                                <div class="row">
                                                    <div class="col d-flex justify-content-end">
                                                        <a class="btn btn-primary" href="#">Reset</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="extra-actions">
                                                <p>Already have an account? <a href="#" id="headerRecoverCancel" class="text-uppercase text-1 font-weight-bold text-color-dark">Log In</a></p>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>