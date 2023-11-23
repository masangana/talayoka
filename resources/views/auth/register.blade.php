@extends('layouts.user.app')

@section('content')
<div role="main" class="main shop py-4">

    <div class="container py-4">

        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <h2 class="font-weight-bold text-5 mb-0">Inscription</h2>
                <form action="{{ route('register') }}" id="frmSignUp" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label text-color-dark text-3">Nom d'Utilisateur<span class="text-color-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg text-4" 
                                    id="name" name="name" value="{{ old('name') }}" 
                                    required autocomplete="name" autofocus>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label text-color-dark text-3">Addresse E-mail <span class="text-color-danger">*</span></label>
                            <input type="" class="form-control form-control-lg text-4"
                            id="email" type="email" name="email" value="{{ old('email') }}" 
                            required autocomplete="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label text-color-dark text-3">Mot de Passe <span class="text-color-danger">*</span></label>
                            <input type="password" value="" class="form-control form-control-lg text-4"
                                    id="password" type="password" name="password" value="{{ old('password') }}" 
                                    required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label text-color-dark text-3">Confirmation Mot de Passe <span class="text-color-danger">*</span></label>
                            <input type="password" value="" class="form-control form-control-lg text-4"
                                    id="password-confirm" type="password" name="password_confirmation" value="{{ old('password') }}" 
                                    required autocomplete="new-password">
                        </div>
                    </div>
                    <input type="hidden" id="role" name="role" value="user" />
    
                    <div class="row">
                        <div class="form-group col">
                            <p class="text-2 mb-2">
                                Vos données personnelles seront utilisées pour soutenir votre expérience sur ce site Web,
                                 pour gérer l'accès à votre compte, et à d'autres fins décrites dans notre
                                 <a href="#" class="text-decoration-none">politique de confidentialité.</a>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <button type="submit" class="btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3" data-loading-text="Loading...">
                                Inscription
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    
    </div>

</div>
@endsection
