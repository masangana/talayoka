@extends('layouts.user.app')

@section('content')
<div role="main" class="main">
    <section class="section border-0 m-0 pb-3">
        <div class="container container-xl-custom">
            <div class="row pb-1">
                @foreach ($lastMovies as $lastMovie)
                    <div class="col-sm-6 col-lg-4 mb-4 pb-2">
                        <a href="blog-post.html">
                            <article>
                                <div class="thumb-info thumb-info-no-borders thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom border-radius-0">
                                    <div class="thumb-info-wrapper thumb-info-wrapper-opacity-6">
                                        <img src="{{asset('storage/cover/'.$lastMovie->artworkInfo->cover)}}" class="img-fluid" alt="How To Take Better Concert Pictures in 30 Seconds">
                                        <div class="thumb-info-title bg-transparent p-4">
                                            <div class="thumb-info-type bg-color-primary px-2 mb-1">{{$lastMovie->category->name}}</div>
                                            <div class="thumb-info-inner mt-1">
                                                <h2 class="text-color-light line-height-2 text-4 font-weight-bold mb-0">
                                                    <a href="{{Route('movie.show', $lastMovie->slug)}}" class="text-color-light text-decoration-none">{{$lastMovie->title}}</a>
                                                </h2>
                                            </div>
                                            <div class="thumb-info-show-more-content">
                                                <p class="mb-0 text-1 line-height-9 mb-1 mt-2 text-light opacity-5">
                                                    {{Str::limit(strip_tags($lastMovie->description), 50)}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="container container-xl-custom">
        <div class="row py-5">
            <div class="col-md-6 col-lg-4">

                <h3 class="font-weight-bold text-3 mb-0">
                    Films Populaires
                </h3>

                <ul class="simple-post-list">
                    @foreach($topMovies as $topMovie)
                        <li>
                            <article>
                                <div class="post-image">
                                    <div class="img-thumbnail img-thumbnail-no-borders d-block">
                                        <a href="{{Route('movie.show', $topMovie->slug)}}">
                                            <img src="{{asset('storage/cover/'.$topMovie->artworkInfo->cover)}}" class="border-radius-0" width="50" height="50" alt="Cover art">
                                        </a>
                                    </div>
                                </div>
                                <div class="post-info">
                                    <h4 class="font-weight-normal text-3 line-height-4 mb-0">
                                        <a href="{{Route('movie.show', $topMovie->slug)}}" class="text-dark">
                                            {{$topMovie->title}}
                                        </a>
                                    </h4>
                                    <div class="post-meta">
                                        {{$topMovie->artworkInfo->production_date->format('d-m-Y')}}
                                    </div>
                                </div>
                            </article>
                        </li>
                    @endforeach
                </ul>

            </div>
            <div class="col-md-6 col-lg-4">

                <h3 class="font-weight-bold text-3 mb-0 mt-4 mt-md-0">
                    Séries Populaires
                </h3>

                <ul class="simple-post-list">
                    @foreach($lastSeries as $lastSerie)
                        <li>
                            <div class="post-image">
                                <div class="img-thumbnail img-thumbnail-no-borders d-block">
                                    <a href="{{Route('serie.show', $lastSerie->slug)}}">
                                        <img src="{{asset('storage/cover/'.optional($lastSerie->artworkInfo)->cover)}}" class="border-radius-0" width="50" height="50" alt="Cover de la serie">
                                    </a>
                                </div>
                            </div>
                            <div class="post-info">
                                <h4 class="font-weight-normal text-3 line-height-4 mb-0">
                                    <a href="{{Route('serie.show', $lastSerie->slug)}}" class="text-dark">
                                        {{$lastSerie->title}}
                                    </a>
                                </h4>
                                <div class="post-meta">
                                    January 12, 2020
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-4">

                <h3 class="font-weight-bold text-3 mt-4 mt-md-0">Film Suggeré</h3>

                <div class="owl-carousel owl-theme" data-plugin-options="{'items': 1, 'margin': 10, 'loop': true, 'nav': false, 'dots': false, 'autoplay': true, 'autoplayTimeout': 5000}">
                    @foreach($suggestedMovies as $suggestedMovie)
                        <div>
                            <a href="{{Route('movie.show', $suggestedMovie->slug)}}">
                                <article>
                                    <div class="thumb-info thumb-info-no-borders thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom border-radius-0">
                                        <div class="thumb-info-wrapper thumb-info-wrapper-opacity-6">
                                            <img src="{{asset('storage/cover/'.$suggestedMovie->artworkInfo->cover)}}" class="img-fluid" alt="{{$suggestedMovie->title}}" style="height: 250px; width : 1200px">
                                            <div class="thumb-info-title bg-transparent p-4">
                                                <div class="thumb-info-type bg-color-primary px-2 mb-1">{{$suggestedMovie->category->name}}</div>
                                                <div class="thumb-info-inner mt-1">
                                                    <h2 class="text-color-light line-height-2 text-4 font-weight-bold mb-0">
                                                        {{$suggestedMovie->title}}
                                                    </h2>
                                                </div>
                                                <div class="thumb-info-show-more-content">
                                                    <p class="mb-0 text-1 line-height-9 mb-1 mt-2 text-light opacity-5">
                                                        {{Str::limit(strip_tags($suggestedMovie->description), 25)}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </a>
                        </div>
                    @endforeach
                </div>

                <h3 class="font-weight-bold text-3 mt-4 pt-2 mb-2 mt-4 mt-md-0">Série Suggerée</h3>

                <div class="post-block post-author pt-2">
                    <div class="img-thumbnail img-thumbnail-no-borders d-block pb-3">
                        <a href="{{Route('serie.show', $suggestedMovie->slug)}}">
                            <img class="border-radius-0" src="{{asset('storage/cover/'.optional($suggestedSerie->artworkInfo)->cover)}}" alt="Cover" style="height: 112px; max-height: 112px; width: auto; max-width: 100%;">
                        </a>
                    </div>
                    <p>
                        <strong class="name">
                            <a href="{{Route('serie.show', $suggestedMovie->slug)}}" class="text-4 pb-2 pt-2 d-block text-dark">
                                {{$suggestedMovie->title}}
                            </a>
                        </strong>
                    </p>
                    <p>
                        {{Str::limit(strip_tags($suggestedSerie->description), 25)}}
                    </p>
                </div>

            </div>
        </div>
    </div>

    <section class="section bg-color-primary border-0 m-0">
        <div class="container container-xl-custom">
            <div class="row">
                <div class="col text-center">								
                    <div class="owl-carousel owl-theme nav-dark stage-margin nav-style-1 m-0" data-plugin-options="{'items': 6, 'margin': 5, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': 40}">
                        @foreach($categories as $category)
                        <div class="px-3">
                            <a href="#" class="btn btn-dark w-100 py-3 rounded-0 text-2 text-uppercase font-weight-bold">
                                {{$category->name}}
                            </a>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container container-xl-custom">

        <div class="row mt-5 pt-3">
            <div class="col-md-9">

                <div class="heading heading-border heading-middle-border">
                    <h3 class="text-4"><strong class="font-weight-bold text-1 px-3 text-light py-2 bg-secondary">Gadgets</strong></h3>
                </div>

                <div class="row pb-1">

                    <div class="col-lg-6 mb-4 pb-1">
                        <article class="thumb-info thumb-info-no-zoom bg-transparent border-radius-0 pb-2 mb-2">
                            <div class="row">
                                <div class="col">
                                    <a href="blog-post.html">
                                        <img src="img/blog/default/blog-67.jpg" class="img-fluid border-radius-0" alt="Why should I buy a smartwatch?">
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="thumb-info-caption-text">
                                        <div class="d-inline-block text-default text-1 mt-2 float-none">
                                            <a href="blog-post.html" class="text-decoration-none text-color-default">January 12, 2020</a>
                                        </div>
                                        <h4 class="d-block line-height-2 text-4 text-dark font-weight-bold mb-0">
                                            <a href="blog-post.html" class="text-decoration-none text-color-dark text-color-hover-primary">Why should I buy a smartwatch?</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="col-lg-6">

                        <article class="thumb-info thumb-info-no-zoom bg-transparent border-radius-0 pb-4 mb-2">
                            <div class="row align-items-center pb-1">
                                <div class="col-sm-4">
                                    <a href="blog-post.html">
                                        <img src="img/blog/default/blog-47.jpg" class="img-fluid border-radius-0" alt="Gadgets That Make Your Smartphone Even Smarter">
                                    </a>
                                </div>
                                <div class="col-sm-8 ps-sm-0">
                                    <div class="thumb-info-caption-text">
                                        <div class="d-inline-block text-default text-1 float-none">
                                            <a href="blog-post.html" class="text-decoration-none text-color-default">January 12, 2020</a>
                                        </div>
                                        <h4 class="d-block pb-2 line-height-2 text-3 text-dark font-weight-bold mb-0">
                                            <a href="blog-post.html" class="text-decoration-none text-color-dark text-color-hover-primary">Gadgets That Make Your Smartphone Even Smarter</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="thumb-info thumb-info-no-zoom bg-transparent border-radius-0 pb-4 mb-2">
                            <div class="row align-items-center pb-1">
                                <div class="col-sm-4">
                                    <a href="blog-post.html">
                                        <img src="img/blog/default/blog-68.jpg" class="img-fluid border-radius-0" alt="The best augmented reality smartglasses">
                                    </a>
                                </div>
                                <div class="col-sm-7 ps-sm-0">
                                    <div class="thumb-info-caption-text">
                                        <div class="d-inline-block text-default text-1 float-none">
                                            <a href="blog-post.html" class="text-decoration-none text-color-default">January 12, 2020</a>
                                        </div>
                                        <h4 class="d-block pb-2 line-height-2 text-3 text-dark font-weight-bold mb-0">
                                            <a href="blog-post.html" class="text-decoration-none text-color-dark text-color-hover-primary">The best augmented reality smartglasses</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="thumb-info thumb-info-no-zoom bg-transparent border-radius-0 pb-4 mb-2">
                            <div class="row align-items-center pb-1">
                                <div class="col-sm-4">
                                    <a href="blog-post.html">
                                        <img src="img/blog/default/blog-67.jpg" class="img-fluid border-radius-0" alt="Why should I buy a smartwatch?">
                                    </a>
                                </div>
                                <div class="col-sm-7 ps-sm-0">
                                    <div class="thumb-info-caption-text">
                                        <div class="d-inline-block text-default text-1 float-none">
                                            <a href="blog-post.html" class="text-decoration-none text-color-default">January 12, 2020</a>
                                        </div>
                                        <h4 class="d-block pb-2 line-height-2 text-3 text-dark font-weight-bold mb-0">
                                            <a href="blog-post.html" class="text-decoration-none text-color-dark text-color-hover-primary">Why should I buy a smartwatch?</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </article>

                    </div>
                </div>

                <div class="heading heading-border heading-middle-border">
                    <h3 class="text-4"><strong class="font-weight-bold text-1 px-3 text-light py-2 bg-tertiary">Lifestyle</strong></h3>
                </div>

                <div class="row pb-1">

                    <div class="col-lg-6 mb-4 pb-1">
                        <article class="thumb-info thumb-info-no-zoom bg-transparent border-radius-0 pb-2 mb-2">
                            <div class="row">
                                <div class="col">
                                    <a href="blog-post.html">
                                        <img src="img/blog/default/blog-49.jpg" class="img-fluid border-radius-0" alt="The Best Way to Ride a Motorcycle">
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="thumb-info-caption-text">
                                        <div class="d-inline-block text-default text-1 mt-2 float-none">
                                            <a href="blog-post.html" class="text-decoration-none text-color-default">January 12, 2020</a>
                                        </div>
                                        <h4 class="d-block line-height-2 text-4 text-dark font-weight-bold mb-0">
                                            <a href="blog-post.html" class="text-decoration-none text-color-dark text-color-hover-primary">The Best Way to Ride a Motorcycle</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="col-lg-6">

                        <article class="thumb-info thumb-info-no-zoom bg-transparent border-radius-0 pb-4 mb-2">
                            <div class="row align-items-center pb-1">
                                <div class="col-sm-4">
                                    <a href="blog-post.html">
                                        <img src="img/blog/default/blog-50.jpg" class="img-fluid border-radius-0" alt="5 Fun Things to Do at the Beach">
                                    </a>
                                </div>
                                <div class="col-sm-7 ps-sm-0">
                                    <div class="thumb-info-caption-text">
                                        <div class="d-inline-block text-default text-1 float-none">
                                            <a href="blog-post.html" class="text-decoration-none text-color-default">January 12, 2020</a>
                                        </div>
                                        <h4 class="d-block pb-2 line-height-2 text-3 text-dark font-weight-bold mb-0">
                                            <a href="blog-post.html" class="text-decoration-none text-color-dark text-color-hover-primary">5 Fun Things to Do at the Beach</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="thumb-info thumb-info-no-zoom bg-transparent border-radius-0 pb-4 mb-2">
                            <div class="row align-items-center pb-1">
                                <div class="col-sm-4">
                                    <a href="blog-post.html">
                                        <img src="img/blog/default/blog-51.jpg" class="img-fluid border-radius-0" alt="Amazingly Fresh Fruit And Herb Drinks For Summer">
                                    </a>
                                </div>
                                <div class="col-sm-7 ps-sm-0">
                                    <div class="thumb-info-caption-text">
                                        <div class="d-inline-block text-default text-1 float-none">
                                            <a href="blog-post.html" class="text-decoration-none text-color-default">January 12, 2020</a>
                                        </div>
                                        <h4 class="d-block pb-2 line-height-2 text-3 text-dark font-weight-bold mb-0">
                                            <a href="blog-post.html" class="text-decoration-none text-color-dark text-color-hover-primary">Amazingly Fresh Fruit And Herb Drinks For Summer</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="thumb-info thumb-info-no-zoom bg-transparent border-radius-0 pb-4 mb-2">
                            <div class="row align-items-center pb-1">
                                <div class="col-sm-4">
                                    <a href="blog-post.html">
                                        <img src="img/blog/default/blog-52.jpg" class="img-fluid border-radius-0" alt="The 20 Best Appetizers with 5 Ingredients">
                                    </a>
                                </div>
                                <div class="col-sm-7 ps-sm-0">
                                    <div class="thumb-info-caption-text">
                                        <div class="d-inline-block text-default text-1 float-none">
                                            <a href="blog-post.html" class="text-decoration-none text-color-default">January 12, 2020</a>
                                        </div>
                                        <h4 class="d-block pb-2 line-height-2 text-3 text-dark font-weight-bold mb-0">
                                            <a href="blog-post.html" class="text-decoration-none text-color-dark text-color-hover-primary">The 20 Best Appetizers with 5 Ingredients</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </article>

                    </div>
                </div>

                <div class="heading heading-border heading-middle-border">
                    <h3 class="text-4"><strong class="font-weight-bold text-1 px-3 text-light py-2 bg-quaternary">Travel</strong></h3>
                </div>

                <div class="row pb-1">

                    <div class="col-lg-6 mb-4 pb-1">
                        <article class="thumb-info thumb-info-no-zoom bg-transparent border-radius-0 pb-2 mb-2">
                            <div class="row">
                                <div class="col">
                                    <a href="blog-post.html">
                                        <img src="img/blog/default/blog-53.jpg" class="img-fluid border-radius-0" alt="6 Tips to Memorize Before Your Next Flight">
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="thumb-info-caption-text">
                                        <div class="d-inline-block text-default text-1 mt-2 float-none">
                                            <a href="blog-post.html" class="text-decoration-none text-color-default">January 12, 2020</a>
                                        </div>
                                        <h4 class="d-block line-height-2 text-4 text-dark font-weight-bold mb-0">
                                            <a href="blog-post.html" class="text-decoration-none text-color-dark text-color-hover-primary">6 Tips to Memorize Before Your Next Flight</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="col-lg-6">

                        <article class="thumb-info thumb-info-no-zoom bg-transparent border-radius-0 pb-4 mb-2">
                            <div class="row align-items-center pb-1">
                                <div class="col-sm-4">
                                    <a href="blog-post.html">
                                        <img src="img/blog/default/blog-54.jpg" class="img-fluid border-radius-0" alt="How to Make Friends as a Grown-Up">
                                    </a>
                                </div>
                                <div class="col-sm-7 ps-sm-0">
                                    <div class="thumb-info-caption-text">
                                        <div class="d-inline-block text-default text-1 float-none">
                                            <a href="blog-post.html" class="text-decoration-none text-color-default">January 12, 2020</a>
                                        </div>
                                        <h4 class="d-block pb-2 line-height-2 text-3 text-dark font-weight-bold mb-0">
                                            <a href="blog-post.html" class="text-decoration-none text-color-dark text-color-hover-primary">How to Make Friends as a Grown-Up</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="thumb-info thumb-info-no-zoom bg-transparent border-radius-0 pb-4 mb-2">
                            <div class="row align-items-center pb-1">
                                <div class="col-sm-4">
                                    <a href="blog-post.html">
                                        <img src="img/blog/default/blog-55.jpg" class="img-fluid border-radius-0" alt="Simple Ways to Have a Pretty Face">
                                    </a>
                                </div>
                                <div class="col-sm-7 ps-sm-0">
                                    <div class="thumb-info-caption-text">
                                        <div class="d-inline-block text-default text-1 float-none">
                                            <a href="blog-post.html" class="text-decoration-none text-color-default">January 12, 2020</a>
                                        </div>
                                        <h4 class="d-block pb-2 line-height-2 text-3 text-dark font-weight-bold mb-0">
                                            <a href="blog-post.html" class="text-decoration-none text-color-dark text-color-hover-primary">Simple Ways to Have a Pretty Face</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="thumb-info thumb-info-no-zoom bg-transparent border-radius-0 pb-4 mb-2">
                            <div class="row align-items-center pb-1">
                                <div class="col-sm-4">
                                    <a href="blog-post.html">
                                        <img src="img/blog/default/blog-56.jpg" class="img-fluid border-radius-0" alt="Ranking the greatest players in basketball">
                                    </a>
                                </div>
                                <div class="col-sm-7 ps-sm-0">
                                    <div class="thumb-info-caption-text">
                                        <div class="d-inline-block text-default text-1 float-none">
                                            <a href="blog-post.html" class="text-decoration-none text-color-default">January 12, 2020</a>
                                        </div>
                                        <h4 class="d-block pb-2 line-height-2 text-3 text-dark font-weight-bold mb-0">
                                            <a href="blog-post.html" class="text-decoration-none text-color-dark text-color-hover-primary">Ranking the greatest players in basketball</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </article>

                    </div>
                </div>

                <div class="text-center py-3 mb-4">
                    <a href="http://themeforest.net/item/porto-responsive-html5-template/4106987" target="_blank" class="d-block">
                        <img alt="Porto" class="img-fluid ps-3" src="img/blog/blog-ad-3.jpg" />
                    </a>
                </div>

            </div>

            <div class="col-md-3">

                <h3 class="font-weight-bold text-3 pt-1">Featured Posts</h3>

                <div class="pb-2">

                    <div class="mb-4 pb-2">
                        <article class="thumb-info thumb-info-no-zoom bg-transparent border-radius-0 pb-2 mb-2">
                            <div class="row">
                                <div class="col">
                                    <a href="blog-post.html">
                                        <img src="img/blog/default/blog-65.jpg" class="img-fluid border-radius-0" alt="Main Reasons To Stop Texting And Driving">
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="thumb-info-caption-text">
                                        <div class="d-inline-block text-default text-1 mt-2 float-none">
                                            <a href="blog-post.html" class="text-decoration-none text-color-default">January 12, 2020</a>
                                        </div>
                                        <h4 class="d-block line-height-2 text-4 text-dark font-weight-bold mb-0">
                                            <a href="blog-post.html" class="text-decoration-none text-color-dark text-color-hover-primary">Main Reasons To Stop Texting And Driving</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="mb-4 pb-2">
                        <article class="thumb-info thumb-info-no-zoom bg-transparent border-radius-0 pb-2 mb-2">
                            <div class="row">
                                <div class="col">
                                    <a href="blog-post.html">
                                        <img src="img/blog/default/blog-66.jpg" class="img-fluid border-radius-0" alt="Tips to Help You Quickly Prepare your Lunch">
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="thumb-info-caption-text">
                                        <div class="d-inline-block text-default text-1 mt-2 float-none">
                                            <a href="blog-post.html" class="text-decoration-none text-color-default">January 12, 2020</a>
                                        </div>
                                        <h4 class="d-block line-height-2 text-4 text-dark font-weight-bold mb-0">
                                            <a href="blog-post.html" class="text-decoration-none text-color-dark text-color-hover-primary">Tips to Help You Quickly Prepare your Lunch</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                </div>

                <aside class="sidebar pb-4">
                    <h5 class="font-weight-semi-bold pt-4">Photos from Instagram</h5>
                    <div class="instagram-feed" data-type="nomargins" class="mb-4 pb-1"></div>
                    <h5 class="font-weight-semi-bold pt-4 mb-2">Tags</h5>
                    <div class="mb-3 pb-1">
                        <a href="#"><span class="badge badge-dark badge-sm rounded-pill text-uppercase px-2 py-1 me-1">design</span></a>
                        <a href="#"><span class="badge badge-dark badge-sm rounded-pill text-uppercase px-2 py-1 me-1">brands</span></a>
                        <a href="#"><span class="badge badge-dark badge-sm rounded-pill text-uppercase px-2 py-1 me-1">video</span></a>
                        <a href="#"><span class="badge badge-dark badge-sm rounded-pill text-uppercase px-2 py-1 me-1">business</span></a>
                        <a href="#"><span class="badge badge-dark badge-sm rounded-pill text-uppercase px-2 py-1 me-1">travel</span></a>
                    </div>
                    <a href="http://themeforest.net/item/porto-responsive-html5-template/4106987" target="_blank" class="my-4 pt-3 d-block">
                        <img alt="Porto" class="img-fluid" src="img/blog/blog-ad-1-medium.jpg" />
                    </a>
                    <h5 class="font-weight-semi-bold pt-4">Find us on Facebook</h5>
                    <div class="fb-page" data-href="https://www.facebook.com/OklerThemes/" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/OklerThemes/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/OklerThemes/">Okler Themes</a></blockquote></div>
                </aside>

                <h5 class="font-weight-semi-bold pt-1">Recent Comments</h5>

                <ul class="list-unstyled mb-4 pb-1 pt-2">

                    <li class="pb-3 text-2">
                        <a href="#" rel="external nofollow" class="font-weight-bold text-dark">John Doe</a> on <a href="blog-post.html" class="text-dark">Main Reasons To Stop Texting And Driving</a>
                    </li>

                    <li class="pb-3 text-2">
                        <a href="#" rel="external nofollow" class="font-weight-bold text-dark">John Doe</a> on <a href="blog-post.html" class="text-dark">Tips to Help You Quickly Prepare your Lunch</a>
                    </li>

                    <li class="pb-3 text-2">
                        <a href="#" rel="external nofollow" class="font-weight-bold text-dark">John Doe</a> on <a href="blog-post.html" class="text-dark">Why should I buy a smartwatch?</a>
                    </li>

                    <li class="pb-3 text-2">
                        <a href="#" rel="external nofollow" class="font-weight-bold text-dark">John Doe</a> on <a href="blog-post.html" class="text-dark">The best augmented reality smartglasses</a>
                    </li>

                    <li class="pb-3 text-2">
                        <a href="#" rel="external nofollow" class="font-weight-bold text-dark">John Doe</a> on <a href="blog-post.html" class="text-dark">12 Healthiest Foods to Eat for Breakfast</a>
                    </li>

                </ul>

            </div>
        </div>

    </div>
</div>
<br>
<br>
@endsection