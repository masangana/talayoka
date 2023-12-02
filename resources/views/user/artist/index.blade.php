@extends('layouts.user.app')

@section('content')

<div role="main" class="main">

    <div class="container container-xl-custom">
        <div class="row py-5">
            @foreach($artists as $artist)
                <div class="post-block post-author pt-2col-md-6 col-lg-4">
                    <div class="img-thumbnail img-thumbnail-no-borders d-block pb-3">
                        <a href="{{Route('user.artist.show', $artist->id)}}">
                            <img class="border-radius-0" src="{{asset('storage/picture/'.$artist->picture)}}" alt="{{$artist->name}}" style="height: 112px; max-height: 112px; width: auto; max-width: 100%;">
                        </a>
                    </div>
                    <p>
                        <strong class="name">
                            <a href="{{Route('user.artist.show', $artist->id)}}" class="text-4 pb-2 pt-2 d-block text-dark">
                                {{$artist->name}}
                            </a>
                        </strong>
                    </p>
                    <p>
                        {{Str::limit(strip_tags($artist->comments), 110)}}
                    </p>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col">
                <ul class="pagination float-end">
                    {{$artists->links()}}
                </ul>
            </div>
        </div>
    </div>

</div>
<br>
<br>
@endsection