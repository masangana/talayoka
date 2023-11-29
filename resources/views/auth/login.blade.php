@extends('layouts.user.app')

@section('content')
<div role="main" class="main shop py-4">

    <div class="container py-4">

        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5 mb-5 mb-lg-0">
                <h2 class="font-weight-bold text-5 mb-0">Login</h2>
                <form action="{{ route('login') }}" id="frmSignIn" method="post" class="needs-validation">
                    @csrf
                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label text-color-dark text-3">Addresse E-mail <span class="text-color-danger">*</span></label>
                            <input  id="email" type="text" name="email" value="{{ old('email') }}" class="form-control form-control-lg text-4" autocomplete="email" autofocus required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label text-color-dark text-3">Mot de Passe <span class="text-color-danger">*</span></label>
                            <input id="password" type="password" value="" class="form-control form-control-lg text-4"name="password" autocomplete="current-password" required>
                        </div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="form-group col-md-auto">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="remember" id="rememberme">
                                <label class="form-label custom-control-label cur-pointer text-2" for="rememberme">Remember Me</label>
                            </div>
                        </div>
                        <div class="form-group col-md-auto">
                            <a class="text-decoration-none text-color-dark text-color-hover-primary font-weight-semibold text-2" href="{{ url('password/reset') }}">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <button type="submit" class="btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3" data-loading-text="Loading...">
                                Connexion
                            </button>
                            <div class="divider">
                                <span class="bg-light px-4 position-absolute left-50pct top-50pct transform3dxy-n50">Ou</span>
                            </div>
                            <a href="{{Route('register')}}" class="btn btn-dark btn-modern w-100 text-transform-none rounded-0 font-weight-bold align-items-center d-inline-flex justify-content-center text-3 py-3" data-loading-text="Loading...">
                                Inscrivez-vous
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>
@endsection
