@extends('layouts.user.app')

@section('content')
<div role="main" class="main">

    <section class="section section-concept section-no-border section-dark section-angled section-angled-reverse pt-5 m-0" style="background-image: url(img/landing/header_bg.jpg); background-size: cover; background-position: center; min-height: 645px;">
        <div class="section-angled-layer-bottom section-angled-layer-increase-angle bg-light" style="padding: 8rem 0;"></div>
        <div class="container pt-lg-5 mt-5">
            <div class="row pt-3 pb-lg-0 pb-xl-0">
                <div class="col-lg-6 pt-4 mb-5 mb-lg-0">
                    <ul class="breadcrumb font-weight-semibold text-4 negative-ls-1">
                        <li>
                            @auth
                                <a href="{{ url('/home') }}">Home</a>
                            @else
                                <a href="{{ url('/') }}">Home</a>
                            @endauth
                        </li>
                        <li class="text-color-primary"><a href="#">Abonnements</a></li>
                    </ul>
                    <h1 class="font-weight-bold text-10 text-xl-12 line-height-2 mb-3">Process</h1>
                    <p class="opacity-7 text-4 negative-ls-05 pb-2 mb-4">With process feature you can display your step content in a modern and intuitive way.</p>
                    <a href="#examples" data-hash data-hash-offset="0" data-hash-offset-lg="100" class="btn btn-gradient-primary btn-effect-4 font-weight-semi-bold px-4 btn-py-2 text-3">Nos Offres <i class="fas fa-arrow-down ms-1"></i></a>
                </div>

            </div>
        </div>
    </section>

    <div class="container pt-4">

        <div class="row mt-5">
            <div class="col">
                <h4 class="mb-2">Une Expéreience Simple</h4>

                <div class="row process process-shapes process-shapes-always-animate my-5">
                    <div class="process-step col-lg-4 mb-5 mb-lg-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                        <div class="process-step-circle">
                            <strong class="process-step-circle-content">01</strong>
                        </div>
                        <div class="process-step-content">
                            <h4 class="mb-1 text-5 font-weight-bold">Créer un Compte</h4>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus nulla dui, in dapibus magna aliquam et.</p>
                        </div>
                    </div>
                    <div class="process-step col-lg-4 mb-5 mb-lg-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
                        <div class="process-step-circle process-shapes-always-animate-delay">
                            <strong class="process-step-circle-content">02</strong>
                        </div>
                        <div class="process-step-content">
                            <h4 class="mb-1 text-5 font-weight-bold">Consulter la Catalogue</h4>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus nulla dui, in dapibus magna aliquam et.</p>
                        </div>
                    </div>
                    <div class="process-step col-lg-4 mb-5 mb-lg-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600">
                        <div class="process-step-circle">
                            <strong class="process-step-circle-content">03</strong>
                        </div>
                        <div class="process-step-content">
                            <h4 class="mb-1 text-5 font-weight-bold">Profiter</h4>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus nulla dui, in dapibus magna aliquam et.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div id="examples" class="container py-2">

        <div class="pricing-table row mb-4">
            <div class="col-md-6 col-lg-3">
                <div class="plan">
                    <div class="plan-header">
                        <h3>Enterprise</h3>
                    </div>
                    <div class="plan-price">
                        <span class="price"><span class="price-unit">$</span>59</span>
                        <label class="price-label">PER MONTH</label>
                    </div>
                    <div class="plan-features">
                        <ul>
                            <li>10GB Disk Space</li>
                            <li>100GB Monthly Bandwith</li>
                            <li>20 Email Accounts</li>
                            <li>Unlimited Subdomains</li>
                        </ul>
                    </div>
                    <div class="plan-footer">
                        <a href="#" class="btn btn-dark btn-modern btn-outline py-2 px-4">Sign Up</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="plan">
                    <div class="plan-header">
                        <h3>Professional</h3>
                    </div>
                    <div class="plan-price">
                        <span class="price"><span class="price-unit">$</span>29</span>
                        <label class="price-label">PER MONTH</label>
                    </div>
                    <div class="plan-features">
                        <ul>
                            <li>5GB Disk Space</li>
                            <li>50GB Monthly Bandwith</li>
                            <li>10 Email Accounts</li>
                            <li>Unlimited Subdomains</li>
                        </ul>
                    </div>
                    <div class="plan-footer">
                        <a href="#" class="btn btn-dark btn-modern btn-outline py-2 px-4">Sign Up</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="plan plan-featured transform-none">
                    <div class="plan-header bg-primary">
                        <h3>Standard</h3>
                    </div>
                    <div class="plan-price">
                        <span class="price"><span class="price-unit">$</span>17</span>
                        <label class="price-label">PER MONTH</label>
                    </div>
                    <div class="plan-features">
                        <ul>
                            <li>3GB Disk Space</li>
                            <li>25GB Monthly Bandwith</li>
                            <li>5 Email Accounts</li>
                            <li>Unlimited Subdomains</li>
                        </ul>
                    </div>
                    <div class="plan-footer">
                        <a href="#" class="btn btn-primary btn-modern py-2 px-4">Sign Up</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="plan">
                    <div class="plan-header">
                        <h3>Basic</h3>
                    </div>
                    <div class="plan-price">
                        <span class="price"><span class="price-unit">$</span>9</span>
                        <label class="price-label">PER MONTH</label>
                    </div>
                    <div class="plan-features">
                        <ul>
                            <li>1GB Disk Space</li>
                            <li>10GB Monthly Bandwith</li>
                            <li>2 Email Accounts</li>
                            <li>Unlimited Subdomains</li>
                        </ul>
                    </div>
                    <div class="plan-footer">
                        <a href="#" class="btn btn-dark btn-modern btn-outline py-2 px-4">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>


    </div>



    <section class="section section-dark section-angled border-0 lazyload pb-0 m-0" style="background-size: 100%; background-position: top;" data-bg-src="img/landing/build_bg.jpg">
        <div class="section-angled-layer-top section-angled-layer-increase-angle bg-color-grey" style="padding: 4rem 0;"></div>
        <div class="container text-center my-5 py-5">
            <h2 class="font-weight-bold line-height-3 text-12 mt-5 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="250" data-appear-animation-duration="750">
                Les arts congolais reunis en seul endroit
            </h2>
            <h4 class="font-weight-bold text-9 mb-4 pb-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500" data-appear-animation-duration="750">A partir de seulement <span class="highlighted-word highlighted-word-animation-1 highlighted-word-animation-1-no-rotate highlighted-word-animation-1 highlighted-word-animation-1-light alternative-font-4 font-weight-extra-bold text-4 light appear-animation" data-appear-animation="blurIn" data-appear-animation-delay="800" data-appear-animation-duration="750">$16!</span></h4>
            <div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900" data-appear-animation-duration="750">
                <h4 class="font-weight-light text-4 col-lg-6 px-0 offset-lg-3 fw-400 mb-5 opacity-8">
                    Profitez du meilleur divertissement 
                </h4>
            </div>
            <div class="col-12 px-0 pb-2 mb-4">
                <div class="row flex-column flex-lg-row justify-content-center">
                    <div class="col-auto">
                        <h5 class="font-weight-semibold text-4 positive-ls-2 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1100" data-appear-animation-duration="750"><i class="fa fa-check"></i> SUPER HIGH PERFORMANCE</h5>
                    </div>
                    <div class="col-auto mx-5 my-2 my-lg-0">
                        <h5 class="font-weight-semibold text-4 positive-ls-2 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1400" data-appear-animation-duration="750"><i class="fa fa-check"></i> Strict Coding Standards</h5>
                    </div>
                    <div class="col-auto">
                        <h5 class="font-weight-semibold text-4 positive-ls-2 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1600" data-appear-animation-duration="750"><i class="fa fa-check"></i> Free Lifetime Updates</h5>
                    </div>
                </div>
            </div>
            <a href="https://themeforest.net/checkout/from_item/4106987?license=regular&support=bundle_6month&ref=Okler" class="btn btn-dark btn-modern btn-rounded px-5 btn-py-3 text-4 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="1800" data-appear-animation-duration="750" target="_blank">BUY PORTO NOW</a>
        </div>
        <div class="row border border-start-0 border-bottom-0 border-end-0 border-color-light-2">
            <div class="col-6 col-md-3 text-center d-flex align-items-center justify-content-center py-4">
                <a href="#" class="text-decoration-none" target="_blank">
                    <div class="icon-box">
                        <i class="icon-bg icon-menu-1"></i>
                        <h4 class="text-4 mb-0">
                            Répertoire Riche
                        </h4>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 text-center divider-left-border border-color-light-2 d-flex align-items-center justify-content-center py-4">
                <a href="#" class="text-decoration-none" target="_blank">
                    <div class="icon-box">
                        <i class="icon-bg icon-menu-2"></i>
                        <h4 class="text-4 mb-0">Support Center</h4>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 text-center divider-left-border border-color-light-2 d-flex align-items-center justify-content-center py-4">
                <a href="#" class="text-decoration-none" target="_blank">
                    <div class="icon-box">
                        <i class="icon-bg icon-menu-3"></i>
                        <h4 class="text-4 mb-0">Lecteur Hors Connexion</h4>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 text-center divider-left-border border-color-light-2 d-flex align-items-center justify-content-center py-4">
                <a href="#" class="text-decoration-none" target="_blank">
                    <div class="icon-box">
                        <i class="icon-bg icon-menu-4"></i>
                        <h4 class="font-weight-500 text-color-light line-height-1 text-4 mt-0 mb-2">
                            Production </span></h4>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="section bg-color-dark-100 border-0 m-0 py-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="list list-unstyled list-inline d-flex align-items-center justify-content-center flex-column flex-lg-row mb-0">
                        <li class="list-inline-item custom-text-color-1 color-inherit mb-lg-0 text-2 pe-2">Porto Versions:</li>
                        <li class="list-inline-item mb-lg-0"><a href="#" class="btn btn-dark btn-modern btn-rounded btn-px-4 py-3 border-0" target="_blank">ADMIN HTML</a></li>
                        <li class="list-inline-item mb-lg-0"><a href="#" class="btn btn-dark btn-modern btn-rounded btn-px-4 py-3 border-0" target="_blank">SHOP HTML</a></li>
                        <li class="list-inline-item mb-lg-0"><a href="#" class="btn btn-dark btn-modern btn-rounded btn-px-4 py-3 border-0" target="_blank">WORDPRESS</a></li>
                        <li class="list-inline-item mb-lg-0"><a href="#" class="btn btn-dark btn-modern btn-rounded btn-px-4 py-3 border-0" target="_blank">MAGENTO</a></li>
                        <li class="list-inline-item mb-lg-0"><a href="#" class="btn btn-dark btn-modern btn-rounded btn-px-4 py-3 border-0" target="_blank">SHOPIFY</a></li>
                        <li class="list-inline-item mb-lg-0"><a href="#" class="btn btn-dark btn-modern btn-rounded btn-px-4 py-3 border-0" target="_blank">DRUPAL</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <br>
    </section>
</div>
<br>

@endsection