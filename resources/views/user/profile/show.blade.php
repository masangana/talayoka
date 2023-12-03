@extends('layouts.user.app')

@section('content')
<div role="main" class="main">

    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-white">User Profile</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="#">Home</a></li>
                        <li class="active">Pages</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container pt-3 pb-2">

        <div class="row pt-2">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs">
                        <ul class="nav nav-tabs nav-justified flex-column flex-md-row">
                            <li class="nav-item">
                                <a class="nav-link active" href="#popular10" data-bs-toggle="tab" class="text-center">Historique</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#recent10" data-bs-toggle="tab" class="text-center">Liste des Souhaits</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="popular10" class="tab-pane active">
                                <div class="container container-xl-custom">
                                    <div class="row py-5">
                                        <div class="col-md-6 col-lg-6">

                                            <h3 class="font-weight-bold text-3 mb-0">Séries</h3>

                                            <ul class="simple-post-list">
                                                @foreach($serieHists as $serieHist)
                                                    <li>
                                                        <article>
                                                            <div class="post-image">
                                                                <div class="img-thumbnail img-thumbnail-no-borders d-block">
                                                                    <a href="{{Route('movie.show', $serieHist->historicable->slug)}}">
                                                                        <img src="{{asset('storage/cover/'.optional($serieHist->historicable->artworkInfo)->cover)}}" class="border-radius-0" width="50" height="50" alt="Simple Ways to Have a Pretty Face">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="post-info">
                                                                <h4 class="font-weight-normal text-3 line-height-4 mb-0">
                                                                    <a href="{{Route('movie.show', $serieHist->historicable->slug)}}" class="text-dark">
                                                                        {{$serieHist->historicable->title}}
                                                                    </a>
                                                                </h4>
                                                                <div class="post-meta">
                                                                    {{$serieHist->historicable->artworkInfo->production_date->format('d-m-Y')}}
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </li>
                                                @endforeach
                                            </ul>

                                        </div>
                                        <div class="col-md-6 col-lg-6">

                                            <h3 class="font-weight-bold text-3 mb-0 mt-4 mt-md-0">Films</h3>

                                            <ul class="simple-post-list">
                                                @foreach($movieHists as $movieHist)
                                                    <li>
                                                        <div class="post-image">
                                                            <div class="img-thumbnail img-thumbnail-no-borders d-block">
                                                                <a href="{{Route('movie.show', $movieHist->historicable->slug)}}">
                                                                    <img src="{{asset('storage/cover/'.optional($movieHist->historicable->artworkInfo)->cover)}}" class="border-radius-0" width="50" height="50" alt="Cover">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="post-info">
                                                            <h4 class="font-weight-normal text-3 line-height-4 mb-0">
                                                                <a href="{{Route('movie.show', $movieHist->historicable->slug)}}" class="text-dark">
                                                                    {{$movieHist->historicable->title}}
                                                                </a>
                                                            </h4>
                                                            <div class="post-meta">
                                                                {{$movieHist->historicable->artworkInfo->production_date->format('d-m-Y')}}
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="recent10" class="tab-pane">
                                <p>Recent</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
@endsection