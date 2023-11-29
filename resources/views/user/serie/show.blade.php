@extends('layouts.user.app')

@section('content')
<div role="main" class="main">

    <div class="container py-4">

        <div class="row">
            <div class="col-lg-3 order-lg-2">
                <aside class="sidebar">

                    <h5 class="font-weight-semi-bold pt-4">{{$title}}</h5>

                    <div class="tabs tabs-dark mb-4 pb-2">
                        <ul class="nav nav-tabs">
                            @foreach ($seasons as $season)
                                <li class="nav-item"><a class="nav-link show @if($loop->first) active @endif" text-1 font-weight-bold text-uppercase" href="#season{{$season->id}}" data-bs-toggle="tab">{{$season->title}}</a></li>
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @foreach($seasons as $season)
                                <div class="tab-pane @if($loop->first) active @endif" id="season{{$season->id}}">
                                    <ul class="simple-post-list">
                                        @foreach($season->episodes as $episode)
                                            <li>
                                                <div class="post-info">
                                                    <a href="{{Route('episode.show', [$serie->slug,$season->title, $episode->id])}}">{{$episode->title}}</a>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                </aside>
            </div>
            <div class="col-lg-9 order-lg-1">
                <div class="blog-posts single-post">

                    <article class="post post-large blog-single-post border-0 m-0 p-0">
                        <div class="post-image ms-0">
                            @if ($episodeView == null)
                                <div class="ratio ratio-16x9">
                                    <video  autoplay="" muted="" loop="" controls="">
                                        <source src="video/memory-of-a-woman.mp4" type="video/mp4">
                                    </video>
                                </div>
                            @endif
                                
                            @if (optional($episodeView)->video_link)
                                <div class="ratio ratio-16x9">
                                    <iframe  src="{{optional($episodeView)->video_link}}" width="640" height="360" allowfullscreen></iframe>
                                </div>
                            @endif
                        </div>

                        <div class="post-content ms-0">
                            <h2 class="font-weight-semi-bold">
                                {{optional($episodeView)->title}}
                            </h2>
                        </div>

                        <div class="post-content ms-0">
                            <p>
                                {{optional($episodeView)->comment}}
                            </p>
                        </div>
                    </article>

                </div>
            </div>
        </div>

    </div>
</div>

<br>
<br>
@endsection