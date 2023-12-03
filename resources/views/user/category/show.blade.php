@extends('layouts.user.app')

@section('content')
<div role="main" class="main pt-3 mt-3">
    <section class="page-header page-header-modern bg-color-grey page-header-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    <h1 class="text-dark"><strong>{{$title}}</strong></h1>
                </div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-block text-md-end">
                        <li><a href="#">Home</a></li>
                        <li class="active">Features</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row pb-1 pt-2">

            <div class="col-md-12">

                <div class="heading heading-border heading-middle-border">
                    <h3 class="text-4"><strong class="font-weight-bold text-1 px-3 text-light py-2 bg-secondary">Films</strong></h3>
                </div>

                <div class="row pb-1">
                    @if($movies->count() == 0)
                        <div class="col-lg-12">
                            <div class="alert alert-danger">
                                <strong>Oops!</strong> Aucun film trouvé.
                            </div>
                        </div>
                    @endif
                    @foreach($movies as $movie)
                        <div class="col-lg-3">
                            <article class="thumb-info thumb-info-no-zoom bg-transparent border-radius-0 pb-4 mb-2">
                                <div class="row align-items-center pb-1">
                                    <div class="col-sm-4">
                                        <a href="{{Route('movie.show', $movie->slug)}}">
                                            <img src="{{asset('storage/cover/'.optional($movie->artworkInfo)->cover)}}" class="img-fluid border-radius-0" alt="Cover">
                                        </a>
                                    </div>
                                    <div class="col-sm-8 ps-sm-0">
                                        <div class="thumb-info-caption-text">
                                            <div class="d-inline-block text-default text-1 float-none">
                                                <a href="{{Route('movie.show', $movie->slug)}}" class="text-decoration-none text-color-default">
                                                    {{$movie->artworkInfo->production_date->format('d-m-Y')}}
                                                </a>
                                            </div>
                                            <h4 class="d-block pb-2 line-height-2 text-3 text-dark font-weight-bold mb-0">
                                                <a href="{{Route('movie.show', $movie->slug)}}" class="text-decoration-none text-color-dark text-color-hover-primary">
                                                    {{$movie->title}}
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col">
                            <ul class="pagination float-end">
                                {{$movies->links()}}
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="heading heading-border heading-middle-border">
                    <h3 class="text-4"><strong class="font-weight-bold text-1 px-3 text-light py-2 bg-quaternary">Séries</strong></h3>
                </div>

                <div class="row pb-1">
                    @if($series->count() == 0)
                        <div class="col-lg-12">
                            <div class="alert alert-danger">
                                <strong>Oops!</strong> Aucune série trouvée.
                            </div>
                        </div>
                    @endif
                    @foreach($series as $serie)
                        <div class="col-lg-3">
                            <article class="thumb-info thumb-info-no-zoom bg-transparent border-radius-0 pb-4 mb-2">
                                <div class="row align-items-center pb-1">
                                    <div class="col-sm-4">
                                        <a href="{{Route('serie.show', $serie->slug)}}">
                                            <img src="{{asset('storage/cover/'.optional($serie->artworkInfo)->cover)}}" class="img-fluid border-radius-0" alt="Cover">
                                        </a>
                                    </div>
                                    <div class="col-sm-8 ps-sm-0">
                                        <div class="thumb-info-caption-text">
                                            <div class="d-inline-block text-default text-1 float-none">
                                                <a href="{{Route('serie.show', $serie->slug)}}" class="text-decoration-none text-color-default">
                                                    @if(optional($serie->artworkInfo)->production_date)
                                                        {{optional($serie->artworkInfo)->production_date->format('d-m-Y')}}
                                                    @endif
                                                </a>
                                            </div>
                                            <h4 class="d-block pb-2 line-height-2 text-3 text-dark font-weight-bold mb-0">
                                                <a href="{{Route('serie.show', $serie->slug)}}" class="text-decoration-none text-color-dark text-color-hover-primary">
                                                    {{$serie->title}}
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col">
                            <ul class="pagination float-end">
                                {{$series->links()}}
                            </ul>
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