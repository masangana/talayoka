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
                            <img class="border-radius-0" src="{{asset('storage/cover/'.$suggestedSerie->artworkInfo->cover)}}" alt="The post author image" style="height: 112px; max-height: 112px; width: auto; max-width: 100%;">
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

                        <div class="px-3">
                            <a href="#" class="btn btn-dark w-100 py-3 rounded-0 text-2 text-uppercase font-weight-bold">Gadgets</a>
                        </div>

                        <div class="px-3">
                            <a href="#" class="btn btn-dark w-100 py-3 rounded-0 text-2 text-uppercase font-weight-bold">Photography</a>
                        </div>

                        <div class="px-3">
                            <a href="#" class="btn btn-dark w-100 py-3 rounded-0 text-2 text-uppercase font-weight-bold">Lifestyle</a>
                        </div>

                        <div class="px-3">
                            <a href="#" class="btn btn-dark w-100 py-3 rounded-0 text-2 text-uppercase font-weight-bold">Fashion</a>
                        </div>

                        <div class="px-3">
                            <a href="#" class="btn btn-dark w-100 py-3 rounded-0 text-2 text-uppercase font-weight-bold">Recipes</a>
                        </div>

                        <div class="px-3">
                            <a href="#" class="btn btn-dark w-100 py-3 rounded-0 text-2 text-uppercase font-weight-bold">Travel</a>
                        </div>

                        <div class="px-3">
                            <a href="#" class="btn btn-dark w-100 py-3 rounded-0 text-2 text-uppercase font-weight-bold">Business</a>
                        </div>

                        <div class="px-3">
                            <a href="#" class="btn btn-dark w-100 py-3 rounded-0 text-2 text-uppercase font-weight-bold">Architecture</a>
                        </div>

                        <div class="px-3">
                            <a href="#" class="btn btn-dark w-100 py-3 rounded-0 text-2 text-uppercase font-weight-bold">Reviews</a>
                        </div>

                        <div class="px-3">
                            <a href="#" class="btn btn-dark w-100 py-3 rounded-0 text-2 text-uppercase font-weight-bold">Sports</a>
                        </div>

                        <div class="px-3">
                            <a href="#" class="btn btn-dark w-100 py-3 rounded-0 text-2 text-uppercase font-weight-bold">Videos</a>
                        </div>

                        <div class="px-3">
                            <a href="#" class="btn btn-dark w-100 py-3 rounded-0 text-2 text-uppercase font-weight-bold">Technology</a>
                        </div>

                        <div class="px-3">
                            <a href="#" class="btn btn-dark w-100 py-3 rounded-0 text-2 text-uppercase font-weight-bold">Design</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container container-xl-custom">

        <div class="row mt-5 pt-3">
            <div class="col-md-9">
                <div class="blog-posts">

                    <article class="post post-large">
                        <div class="post-image">
                            <a href="blog-post.html">
                                <img src="img/blog/wide/blog-54.jpg" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="How to Make Friends as a Grown-Up" />
                            </a>
                        </div>

                        <div class="post-date text-1">
                            <span class="day border-radius-0 text-4 text-dark">12</span>
                            <span class="month border-radius-0 text-1 bg-color-dark">Jan</span>
                        </div>

                        <div class="post-content">

                            <h2 class="font-weight-semibold text-6 line-height-3 mb-3"><a href="blog-post.html" class="text-color-dark text-color-hover-primary">How to Make Friends as a Grown-Up</a></h2>
                            <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. Pellentesque pellentesque tempor tellus eget hendrerit. Morbi id aliquam ligula. Aliquam id dui sem. Proin rhoncus consequat nisl, eu ornare mauris tincidunt vitae. [...]</p>

                            <div class="post-meta">
                                <span><i class="far fa-user"></i> By <a href="#">John Doe</a> </span>
                                <span><i class="far fa-folder"></i> <a href="#">Lifestyle</a>, <a href="#">Travel</a> </span>
                                <span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span>
                                <span class="d-block d-sm-inline-block float-sm-end mt-3 mt-sm-0"><a href="blog-post.html" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
                            </div>

                        </div>
                    </article>

                    <article class="post post-large">
                        <div class="post-image">
                            <a href="blog-post.html">
                                <img src="img/blog/wide/blog-55.jpg" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="Simple Ways to Have a Pretty Face" />
                            </a>
                        </div>

                        <div class="post-date text-1">
                            <span class="day border-radius-0 text-4 text-dark">12</span>
                            <span class="month border-radius-0 text-1 bg-color-dark">Jan</span>
                        </div>

                        <div class="post-content">

                            <h2 class="font-weight-semibold text-6 line-height-3 mb-3"><a href="blog-post.html" class="text-color-dark text-color-hover-primary">Simple Ways to Have a Pretty Face</a></h2>
                            <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. Pellentesque pellentesque tempor tellus eget hendrerit. Morbi id aliquam ligula. Aliquam id dui sem. Proin rhoncus consequat nisl, eu ornare mauris tincidunt vitae. [...]</p>

                            <div class="post-meta">
                                <span><i class="far fa-user"></i> By <a href="#">John Doe</a> </span>
                                <span><i class="far fa-folder"></i> <a href="#">Photography</a>, <a href="#">Travel</a> </span>
                                <span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span>
                                <span class="d-block d-sm-inline-block float-sm-end mt-3 mt-sm-0"><a href="blog-post.html" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
                            </div>

                        </div>
                    </article>

                    <article class="post post-large">
                        <div class="post-image">
                            <a href="blog-post.html">
                                <img src="img/blog/wide/blog-56.jpg" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="Ranking the greatest players in basketball" />
                            </a>
                        </div>

                        <div class="post-date text-1">
                            <span class="day border-radius-0 text-4 text-dark">12</span>
                            <span class="month border-radius-0 text-1 bg-color-dark">Jan</span>
                        </div>

                        <div class="post-content">

                            <h2 class="font-weight-semibold text-6 line-height-3 mb-3"><a href="blog-post.html" class="text-color-dark text-color-hover-primary">Ranking the greatest players in basketball</a></h2>
                            <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. Pellentesque pellentesque tempor tellus eget hendrerit. Morbi id aliquam ligula. Aliquam id dui sem. Proin rhoncus consequat nisl, eu ornare mauris tincidunt vitae. [...]</p>

                            <div class="post-meta">
                                <span><i class="far fa-user"></i> By <a href="#">John Doe</a> </span>
                                <span><i class="far fa-folder"></i> <a href="#">Sports</a>, <a href="#">Business</a> </span>
                                <span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span>
                                <span class="d-block d-sm-inline-block float-sm-end mt-3 mt-sm-0"><a href="blog-post.html" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
                            </div>

                        </div>
                    </article>

                    <article class="post post-large">
                        <div class="post-image">
                            <div class="owl-carousel owl-theme show-nav-hover dots-inside nav-inside nav-style-1 nav-light" data-plugin-options="{'items': 1, 'margin': 10, 'loop': false, 'nav': true, 'dots': true}">
                                <div>
                                    <div class="img-thumbnail border-0 p-0 d-block">
                                        <a href="blog-post.html">
                                            <img src="img/blog/wide/blog-58.jpg" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="Top Camper Trailer Towing Tips" />
                                        </a>
                                    </div>
                                </div>
                                <div>
                                    <div class="img-thumbnail border-0 p-0 d-block">
                                        <a href="blog-post.html">
                                            <img src="img/blog/wide/blog-58.jpg" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="Top Camper Trailer Towing Tips" />
                                        </a>
                                    </div>
                                </div>
                                <div>
                                    <div class="img-thumbnail border-0 p-0 d-block">
                                        <a href="blog-post.html">
                                            <img src="img/blog/wide/blog-58.jpg" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="Top Camper Trailer Towing Tips" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="post-date text-1">
                            <span class="day border-radius-0 text-4 text-dark">12</span>
                            <span class="month border-radius-0 text-1 bg-color-dark">Jan</span>
                        </div>

                        <div class="post-content">

                            <h2 class="font-weight-semibold text-6 line-height-3 mb-3"><a href="blog-post.html" class="text-color-dark text-color-hover-primary">Top Camper Trailer Towing Tips</a></h2>
                            <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. Pellentesque pellentesque tempor tellus eget hendrerit. Morbi id aliquam ligula. Aliquam id dui sem. Proin rhoncus consequat nisl, eu ornare mauris tincidunt vitae. [...]</p>

                            <div class="post-meta">
                                <span><i class="far fa-user"></i> By <a href="#">John Doe</a> </span>
                                <span><i class="far fa-folder"></i> <a href="#">Travel</a>, <a href="#">Lifestyle</a> </span>
                                <span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span>
                                <span class="d-block d-sm-inline-block float-sm-end mt-3 mt-sm-0"><a href="blog-post.html" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
                            </div>

                        </div>
                    </article>

                    <article class="post post-large">
                        <div class="post-image">
                            <div class="lightbox" data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}, 'mainClass': 'mfp-with-zoom', 'zoom': {'enabled': true, 'duration': 300}}">
                                <div class="row mx-0">
                                    <div class="col-6 col-md-4 p-0">
                                        <a href="img/blog/square/blog-13.jpg">
                                            <span class="thumb-info thumb-info-no-borders thumb-info-centered-icons">
                                                <span class="thumb-info-wrapper">
                                                    <img src="img/blog/square/blog-13.jpg" class="img-fluid" alt="Post lightbox image 1" />
                                                    <span class="thumb-info-action">
                                                        <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-plus text-dark"></i></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="col-6 col-md-4 p-0">
                                        <a href="img/blog/square/blog-16.jpg">
                                            <span class="thumb-info thumb-info-no-borders thumb-info-centered-icons">
                                                <span class="thumb-info-wrapper">
                                                    <img src="img/blog/square/blog-16.jpg" class="img-fluid" alt="Post lightbox image 2" />
                                                    <span class="thumb-info-action">
                                                        <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-plus text-dark"></i></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="col-6 col-md-4 p-0">
                                        <a href="img/blog/square/blog-20.jpg">
                                            <span class="thumb-info thumb-info-no-borders thumb-info-centered-icons">
                                                <span class="thumb-info-wrapper">
                                                    <img src="img/blog/square/blog-20.jpg" class="img-fluid" alt="Post lightbox image 3" />
                                                    <span class="thumb-info-action">
                                                        <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-plus text-dark"></i></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="col-6 col-md-4 p-0">
                                        <a href="img/blog/square/blog-23.jpg">
                                            <span class="thumb-info thumb-info-no-borders thumb-info-centered-icons">
                                                <span class="thumb-info-wrapper">
                                                    <img src="img/blog/square/blog-23.jpg" class="img-fluid" alt="Post lightbox image 4" />
                                                    <span class="thumb-info-action">
                                                        <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-plus text-dark"></i></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="col-6 col-md-4 p-0">
                                        <a href="img/blog/square/blog-29.jpg">
                                            <span class="thumb-info thumb-info-no-borders thumb-info-centered-icons">
                                                <span class="thumb-info-wrapper">
                                                    <img src="img/blog/square/blog-29.jpg" class="img-fluid" alt="Post lightbox image 5" />
                                                    <span class="thumb-info-action">
                                                        <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-plus text-dark"></i></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="col-6 col-md-4 p-0">
                                        <a href="img/blog/square/blog-40.jpg">
                                            <span class="thumb-info thumb-info-no-borders thumb-info-centered-icons">
                                                <span class="thumb-info-wrapper">
                                                    <img src="img/blog/square/blog-40.jpg" class="img-fluid" alt="Post lightbox image 6" />
                                                    <span class="thumb-info-action">
                                                        <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-plus text-dark"></i></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="post-date text-1">
                            <span class="day border-radius-0 text-4 text-dark">8</span>
                            <span class="month border-radius-0 text-1 bg-color-dark">Jan</span>
                        </div>

                        <div class="post-content">

                            <h2 class="font-weight-semibold text-6 line-height-3 mb-3"><a href="blog-post.html" class="text-color-dark text-color-hover-primary">10 Best Travel Tips After 5 Years Traveling The World</a></h2>
                            <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. Pellentesque pellentesque tempor tellus eget hendrerit. Morbi id aliquam ligula. Aliquam id dui sem. Proin rhoncus consequat nisl, eu ornare mauris tincidunt vitae. [...]</p>

                            <div class="post-meta">
                                <span><i class="far fa-user"></i> By <a href="#">John Doe</a> </span>
                                <span><i class="far fa-folder"></i> <a href="#">Travel</a>, <a href="#">Lifestyle</a> </span>
                                <span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span>
                                <span class="d-block d-sm-inline-block float-sm-end mt-3 mt-sm-0"><a href="blog-post.html" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
                            </div>

                        </div>
                    </article>

                    <article class="post post-large">
                        <div class="post-image">
                            <div class="ratio ratio-16x9">
                                <iframe  src="https://player.vimeo.com/video/45830194?color=ffffff&title=0&byline=0&portrait=0&badge=0" width="640" height="360" allowfullscreen></iframe>
                            </div>
                        </div>

                        <div class="post-date text-1">
                            <span class="day border-radius-0 text-4 text-dark">7</span>
                            <span class="month border-radius-0 text-1 bg-color-dark">Jan</span>
                        </div>

                        <div class="post-content">

                            <h2 class="font-weight-semibold text-6 line-height-3 mb-3"><a href="blog-post.html" class="text-color-dark text-color-hover-primary">7 Steps to Learn How to Play Piano</a></h2>
                            <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. Pellentesque pellentesque tempor tellus eget hendrerit. Morbi id aliquam ligula. Aliquam id dui sem. Proin rhoncus consequat nisl, eu ornare mauris tincidunt vitae. [...]</p>

                            <div class="post-meta">
                                <span><i class="far fa-user"></i> By <a href="#">John Doe</a> </span>
                                <span><i class="far fa-folder"></i> <a href="#">Travel</a>, <a href="#">Lifestyle</a> </span>
                                <span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span>
                                <span class="d-block d-sm-inline-block float-sm-end mt-3 mt-sm-0"><a href="blog-post.html" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
                            </div>

                        </div>
                    </article>

                    <article class="post post-large">
                        <div class="post-image">
                            <div class="ratio ratio-16x9">
                                <video id="blogPostVideo" width="100%" height="100%" muted loop preload="metadata" poster="video/memory-of-a-woman.jpg">
                                      <source src="video/memory-of-a-woman.webm" type="video/webm">
                                      <source src="video/memory-of-a-woman.mp4" type="video/mp4">
                                </video>
                                <a href="#" class="position-absolute top-50pct left-50pct transform3dxy-n50 bg-light rounded-circle d-flex align-items-center justify-content-center text-decoration-none bg-color-hover-primary text-color-hover-light play-button-lg" data-trigger-play-video="#blogPostVideo" data-trigger-play-video-remove="yes">
                                    <i class="fas fa-play text-5"></i>
                                </a>
                            </div>
                        </div>

                        <div class="post-date text-1">
                            <span class="day border-radius-0 text-4 text-dark">6</span>
                            <span class="month border-radius-0 text-1 bg-color-dark">Jan</span>
                        </div>

                        <div class="post-content">

                            <h2 class="font-weight-semibold text-6 line-height-3 mb-3"><a href="blog-post.html" class="text-color-dark text-color-hover-primary">8 Amazing Things You Won't Believe Actually Exist In Nature</a></h2>
                            <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. Pellentesque pellentesque tempor tellus eget hendrerit. Morbi id aliquam ligula. Aliquam id dui sem. Proin rhoncus consequat nisl, eu ornare mauris tincidunt vitae. [...]</p>

                            <div class="post-meta">
                                <span><i class="far fa-user"></i> By <a href="#">John Doe</a> </span>
                                <span><i class="far fa-folder"></i> <a href="#">Lifestyle</a>, <a href="#">Travel</a> </span>
                                <span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span>
                                <span class="d-block d-sm-inline-block float-sm-end mt-3 mt-sm-0"><a href="blog-post.html" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
                            </div>

                        </div>
                    </article>

                    <ul class="pagination float-end">
                        <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
                    </ul>

                </div>
            </div>
            <div class="col-md-3">
                <aside class="sidebar pb-4" data-plugin-sticky data-plugin-options="{'minWidth': 991, 'containerSelector': '.container', 'padding': {'top': 110}}">
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
            </div>
        </div>

    </div>
</div>
<br>
<br>
@endsection