@extends('layouts.user.app')

@section('content')
<div role="main" class="main">

    <div class="container pt-5">

        <div class="row py-4 mb-2">
            <div class="col-md-7 order-2">
                <div class="overflow-hidden">
                    <h2 class="text-color-dark font-weight-bold text-12 mb-2 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300">
                        {{strip_tags($artist->name)}}
                    </h2>
                </div>
                <div class="overflow-hidden mb-3">
                    <p class="font-weight-bold text-primary text-uppercase mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="500">Artiste</p>
                </div>
                <p class="lead appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">
                    {{strip_tags($artist->comments)}}
                </p>
                <hr class="solid my-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900">
                <div class="row align-items-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000">
                    <div class="col-lg-6">
                        <a href="#" class="btn btn-modern btn-dark mt-3">Get In Touch</a>
                        <a href="#" class="btn btn-modern btn-primary mt-3">Hire Me</a>
                    </div>
                    <div class="col-sm-6 text-lg-end my-4 my-lg-0">
                        <strong class="text-uppercase text-1 me-3 text-dark">follow me</strong>
                        <ul class="social-icons float-lg-end">
                            <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                            <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-5 order-md-2 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter">
                <img src="{{asset('storage/picture/'.$artist->picture)}}" class="img-fluid mb-2" alt="">
            </div>
        </div>
    </div>

    <section class="section section-default border-0 mt-5 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="1200">
        <div class="container py-4">

            <div class="row featured-boxes featured-boxes-style-4">
                <div class="col-md-6 col-lg-3 my-2">
                    <div class="m-0 featured-box featured-box-primary featured-box-effect-4 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="1600">
                        <div class="box-content p-0 text-start">
                            <i class="icon-featured icon-screen-tablet icons text-12 m-0 p-0"></i>
                            <h4 class="font-weight-bold text-color-dark">Mobile Apps</h4>
                            <p class="mb-0">Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 my-2">
                    <div class="m-0 featured-box featured-box-primary featured-box-effect-4 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="1400">
                        <div class="box-content p-0 text-start">
                            <i class="icon-featured icon-layers icons text-12 m-0 p-0"></i>
                            <h4 class="font-weight-bold text-color-dark">Creative Websites</h4>
                            <p class="mb-0">Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 my-2">
                    <div class="m-0 featured-box featured-box-primary featured-box-effect-4 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1400">
                        <div class="box-content p-0 text-start">
                            <i class="icon-featured icon-magnifier icons text-12 m-0 p-0"></i>
                            <h4 class="font-weight-bold text-color-dark">SEO Optimization</h4>
                            <p class="mb-0">Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 my-2">
                    <div class="m-0 featured-box featured-box-primary featured-box-effect-4 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1600">
                        <div class="box-content p-0 text-start">
                            <i class="icon-featured icon-screen-desktop icons text-12 m-0 p-0"></i>
                            <h4 class="font-weight-bold text-color-dark">Brand Solutions</h4>
                            <p class="mb-0">Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div class="container pt-5 pb-2">
        <div class="overflow-hidden">
            <h2 class="text-color-dark font-weight-normal text-6 mb-0 appear-animation" data-appear-animation="maskUp"><strong class="font-weight-extra-bold">Projets</strong></h2>
        </div>
        <div class="overflow-hidden mb-3">
            <p class="mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">Lorem ipsum dolor sit amet, consectetur adipiscing elit massa enim. Nullam id varius nunc.</p>
        </div>

        <div class="row">
            <div class="col">
                <div class="blog-posts">

                    <div class="row">
                        @foreach ($artist->artworks as $artwork)
                            <div class="col-md-4 col-lg-3">
                                <article class="post post-medium border-0 pb-0 mb-5">
                                    <div class="post-image">
                                        @if ($artwork->artworkable_type == "App\Models\Series")
                                                    <a href="{{Route('serie.show', $artwork->artworkable->slug)}}">
                                                        <img src="{{asset('storage/cover/'.$artwork->artworkable->artworkInfo->cover)}}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-3" style="height: 200px; width: 320px" alt="" />
                                                    </a>
                                                @else
                                                    <a href="{{Route('movie.show', $artwork->artworkable->slug)}}">
                                                        <img src="{{asset('storage/cover/'.$artwork->artworkable->artworkInfo->cover)}}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-3" style="height: 200px; width: 320px" alt="" />
                                                    </a>
                                                @endif
                                    </div>

                                    <div class="post-content">
                                        <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2">

                                            @if ($artwork->artworkable_type == "App\Models\Series")
                                                    <a href="{{Route('serie.show', $artwork->artworkable->slug)}}">
                                                        {{$artwork->artworkable->title}}
                                                    </a>
                                                @else
                                                    <a href="{{Route('movie.show', $artwork->artworkable->slug)}}">
                                                        {{$artwork->artworkable->title}}
                                                    </a>
                                                @endif
                                        </h2>
                                        <span class="thumb-info-type">
                                            @if ($artwork->artworkable_type == "App\Models\Series")
                                                Série
                                            @else
                                                Film
                                            @endif
                                        </span>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<br>
<br>
@endsection