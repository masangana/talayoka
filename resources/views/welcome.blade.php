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
                                    @if(optional($lastSerie->artworkInfo)->production_date)
                                        {{optional($lastSerie->artworkInfo)->production_date->format('d-m-Y')}}
                                    @endif
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
                            <a href="{{Route('category.show', $category->name)}}" class="btn btn-dark w-100 py-3 rounded-0 text-2 text-uppercase font-weight-bold">
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
                    <h3 class="text-4"><strong class="font-weight-bold text-1 px-3 text-light py-2 bg-secondary">Derniers Films</strong></h3>
                </div>

                <div class="row pb-1">

                    <div class="col-lg-6 mb-4 pb-1">
                        <article class="thumb-info thumb-info-no-zoom bg-transparent border-radius-0 pb-2 mb-2">
                            <div class="row">
                                <div class="col">
                                    <a href="{{Route('movie.show', optional($lastesMovies[0])->slug)}}">
                                        <img src="{{asset('storage/cover/'.optional($lastesMovies[0]->artworkInfo)->cover)}}" class="img-fluid border-radius-0" alt="cover" style="height: 300px; width:900px">
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="thumb-info-caption-text">
                                        <div class="d-inline-block text-default text-1 mt-2 float-none">
                                            <a href="{{Route('movie.show', optional($lastesMovies[0])->slug)}}" class="text-decoration-none text-color-default">
                                                {{optional($lastesMovies[0])->artworkInfo->production_date->format('d-m-Y')}}
                                            </a>
                                        </div>
                                        <h4 class="d-block line-height-2 text-4 text-dark font-weight-bold mb-0">
                                            <a href="blog-post.html" class="text-decoration-none text-color-dark text-color-hover-primary">
                                                {{optional($lastesMovies[0])->title}}
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="col-lg-6">
                        @foreach($lastesMovies as $lastesMovie)
                            @continue($loop->first)
                            <article class="thumb-info thumb-info-no-zoom bg-transparent border-radius-0 pb-4 mb-2">
                                <div class="row align-items-center pb-1">
                                    <div class="col-sm-4">
                                        <a href="{{Route('movie.show', optional($lastesMovie)->slug)}}">
                                            <img src="{{asset('storage/cover/'.optional($lastesMovie->artworkInfo)->cover)}}" class="img-fluid border-radius-0" alt="Cover" style="height: 90px">
                                        </a>
                                    </div>
                                    <div class="col-sm-8 ps-sm-0">
                                        <div class="thumb-info-caption-text">
                                            <div class="d-inline-block text-default text-1 float-none">
                                                <a href="{{Route('movie.show', optional($lastesMovie)->slug)}}" class="text-decoration-none text-color-default">
                                                    {{optional($lastesMovie)->artworkInfo->production_date->format('d-m-Y')}}
                                                </a>
                                            </div>
                                            <h4 class="d-block pb-2 line-height-2 text-3 text-dark font-weight-bold mb-0">
                                                <a href="{{Route('movie.show', optional($lastesMovie)->slug)}}" class="text-decoration-none text-color-dark text-color-hover-primary">
                                                    {{optional($lastesMovie)->title}}
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>

                <div class="heading heading-border heading-middle-border">
                    <h3 class="text-4"><strong class="font-weight-bold text-1 px-3 text-light py-2 bg-quaternary">Dernieres Séries</strong></h3>
                </div>

                <div class="row pb-1">

                    <div class="col-lg-6 mb-4 pb-1">
                        <article class="thumb-info thumb-info-no-zoom bg-transparent border-radius-0 pb-2 mb-2">
                            <div class="row">
                                <div class="col">
                                    <a href="{{Route('serie.show', optional($lastesSeries[0])->slug)}}">
                                        <img src="{{asset('storage/cover/'.optional($lastesSeries[0]->artworkInfo)->cover)}}" class="img-fluid border-radius-0" alt="cover" style="height: 300px; width:900px">
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="thumb-info-caption-text">
                                        <div class="d-inline-block text-default text-1 mt-2 float-none">
                                            <a href="{{Route('serie.show', optional($lastesSeries[0])->slug)}}" class="text-decoration-none text-color-default">
                                                {{optional($lastesSeries[0])->artworkInfo->production_date->format('d-m-Y')}}
                                            </a>
                                        </div>
                                        <h4 class="d-block line-height-2 text-4 text-dark font-weight-bold mb-0">
                                            <a href="{{Route('serie.show', optional($lastesSeries[0])->slug)}}" class="text-decoration-none text-color-dark text-color-hover-primary">
                                                {{optional($lastesSeries[0])->title}}
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="col-lg-6">
                        @foreach($lastesSeries as $lastesSerie)
                            @continue($loop->first)
                            <article class="thumb-info thumb-info-no-zoom bg-transparent border-radius-0 pb-4 mb-2">
                                <div class="row align-items-center pb-1">
                                    <div class="col-sm-4">
                                        <a href="{{Route('serie.show', optional($lastesSerie)->slug)}}">
                                            <img src="{{asset('storage/cover/'.optional($lastesSerie->artworkInfo)->cover)}}" class="img-fluid border-radius-0" alt="Cover" style="height: 90px">
                                        </a>
                                    </div>
                                    <div class="col-sm-8 ps-sm-0">
                                        <div class="thumb-info-caption-text">
                                            <div class="d-inline-block text-default text-1 float-none">
                                                <a href="{{Route('serie.show', optional($lastesSerie)->slug)}}" class="text-decoration-none text-color-default">
                                                    @if(optional($lastesSerie->artworkInfo)->production_date)
                                                        {{optional($lastesSerie->artworkInfo)->production_date->format('d-m-Y')}}   
                                                    @endif
                                                </a>
                                            </div>
                                            <h4 class="d-block pb-2 line-height-2 text-3 text-dark font-weight-bold mb-0">
                                                <a href="{{Route('serie.show', optional($lastesSerie)->slug)}}" class="text-decoration-none text-color-dark text-color-hover-primary">
                                                    {{optional($lastesSerie)->title}}
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>

            </div>

            <div class="col-md-3">

                <h3 class="font-weight-bold text-3 pt-1">Les Classiques</h3>

                <div class="pb-2">
                    @foreach($classicMovies as $classicMovie)
                        <div class="mb-4 pb-2">
                            <article class="thumb-info thumb-info-no-zoom bg-transparent border-radius-0 pb-2 mb-2">
                                <div class="row">
                                    <div class="col">
                                        <a href="{{Route('serie.show', optional($classicMovie)->slug)}}">
                                            <img src="{{asset('storage/cover/'.optional($classicMovie->artworkInfo)->cover)}}" class="img-fluid border-radius-0" alt="Cover" style="height: 200px">
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="thumb-info-caption-text">
                                            <div class="d-inline-block text-default text-1 mt-2 float-none">
                                                <a href="{{Route('serie.show', optional($classicMovie)->slug)}}" class="text-decoration-none text-color-default">
                                                    @if(optional($classicMovie->artworkInfo)->production_date)
                                                        {{optional($classicMovie->artworkInfo)->production_date->format('d-m-Y')}}
                                                    @endif
                                                </a>
                                            </div>
                                            <h4 class="d-block line-height-2 text-4 text-dark font-weight-bold mb-0">
                                                <a href="{{Route('serie.show', optional($classicMovie)->slug)}}" class="text-decoration-none text-color-dark text-color-hover-primary">
                                                    {{optional($classicMovie)->title}}
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
</div>
<br>
<br>
@endsection