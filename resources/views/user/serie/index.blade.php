@extends('layouts.user.app')

@section('content')
<div role="main" class="main">
    <div class="container py-4">

        <div class="row">
            <div class="col">
                <div class="blog-posts">

                    <div class="row">
                        @foreach ($series as $serie)
                            <div class="col-md-4 col-lg-3">
                                <article class="post post-medium border-0 pb-0 mb-5">
                                    <div class="post-image">
                                        <a href="{{Route('serie.show', $serie->slug)}}">
                                            <img src="{{asset('storage/cover/'.optional($serie->artworkInfo)->cover)}}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-3" style="height: 200px; width: 320px" alt="" />
                                        </a>
                                    </div>

                                    <div class="post-content">
                                        <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2">
                                            <a href="{{Route('serie.show', $serie->slug)}}">
                                                {{$serie->title}}
                                            </a>
                                        </h2>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>

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
@endsection