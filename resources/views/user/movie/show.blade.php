@extends('layouts.user.app')

@section('content')
<div role="main" class="main">

    <div class="container py-4">

        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="blog-posts single-post">

                    <article class="post post-large blog-single-post border-0 m-0 p-0">
                        <div class="post-image ms-0">
                            @if ($movie->video_link == null)
                                <div class="ratio ratio-16x9">
                                    <video  autoplay="" muted="" loop="" controls="">
                                        <source src="video/memory-of-a-woman.mp4" type="video/mp4">
                                    </video>
                                </div>
                            @endif
                                
                            @if (optional($movie)->video_link)
                                <div class="ratio ratio-16x9">
                                    <iframe  src="{{optional($movie)->video_link}}" width="540" height="240" allowfullscreen></iframe>
                                </div>
                            @endif
                        </div>

                        <div class="post-content ms-0">
                            <h2 class="font-weight-semi-bold">
                                {{optional($movie)->title}}
                            </h2>
                        </div>

                        <div class="post-content ms-0">
                            <p>
                                {{optional($movie)->description}}
                            </p>
                        </div>
                    </article>

                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>

    </div>
</div>

<br>
<br>
@endsection