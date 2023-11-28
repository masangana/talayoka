@extends('layouts.admin.app')

@section('content')

<!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
              <div class="card-body">
                <h5 class="card-title">Total Films</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-shop"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$movies->count()}}</h6>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">

                    <div class="card-body">
                    <h5 class="card-title">Les Boutiques</h5>

                    <table class="table table-borderless datatable">
                        <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Déscription</th>
                            <th scope="col">Réalisateur</th>
                            <th scope="col">Trailer</th>
                            <th scope="col">Film</th>
                            <th scope="col">Catégorie</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($movies as $movie)
                                <tr>
                                    <td>
                                        <a href="{{Route('admin.movie.edit', $movie->id)}}">
                                            {{$movie->title}}
                                        </a>
                                    </td>
                                    <td>
                                        {{$movie->description}}
                                    </td>
                                    <td>
                                        {{optional($movie->artworkInfo)->director}}
                                    </td>
                                    <td>
                                        <a href="{{optional($movie->artworkInfo)->trailler}}" target="_blank" rel="noopener noreferrer">
                                            Bande Annonce
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{$movie->video_link}}" target="_blank" rel="noopener noreferrer">
                                            Bande Annonce
                                        </a>
                                    </td>
                                    <td>
                                        {{$movie->category->name}}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    </div>

                </div>
            </div>
          <!-- End Recent Sales -->

        </div>
      </div><!-- End Left side columns -->

    </div>
</section>
@endsection