@extends('layouts.admin.app')

@section('content')

<section class="section">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Création</h5>
              @if (session('success'))
                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                  Serie ajoutée avec succès
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              @if ($errors->any())
                <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                  Une erreur est survenue lors de l'ajout de la série
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              <!-- Floating Labels Form -->
              <form class="row g-3" method="POST" action="{{Route('admin.serie.update', $serie->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" value="{{old('title') ?? $serie->title}}" class="form-control" id="floatingName" placeholder="Titre de la série" name="title" required>
                    <label for="floatingName">Titre</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" value="{{old('slug') ?? $serie->slug}}" class="form-control" id="floatingEmail" placeholder="Slug" name="slug" required>
                    <label for="floatingEmail">Slug</label>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                      <select class="form-select" id="floatingSelect" aria-label="State" name="category_id">
                        <option value="" selected>...</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" @selected($serie->category_id == $category->id) >{{$category->name}}</option>
                        @endforeach
                      </select>
                      <label for="floatingSelect">Catégorie</label>
                    </div>
                  </div>
                <div class="col-12">
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;" name="description">{{ old('description')?? $serie->description}}
                    </textarea>
                    <label for="floatingTextarea">Description</label>
                  </div>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" value="{{old('trailler') ?? $serie->artworkInfo->trailler}}" class="form-control" id="floatingName" placeholder="Your Name" name="trailler" required>
                      <label for="floatingName">Trailler</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" value="{{old('director') ?? $serie->artworkInfo->director}}" class="form-control" id="floatingName" placeholder="Your Name" name="director">
                      <label for="floatingName">Réalisateur</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                      <input type="date" value="{{old('production_date') ?? $serie->artworkInfo->production_date}}" class="form-control" name="production_date">
                      <label for="inputDate" class="col-sm-2 col-form-label">Date de Production</label>
                    </div>
                </div>
                
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="file" class="form-control" name="cover">
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End floating Labels Form -->
  
            </div>
        </div>  

      </div>

      <div class="col-lg-6">
        <!-- 
        <div class="card">
          <br>
          <div class="card-body">
            @if(optional($serie->artworkInfo)->cover)
              <img src="{{asset('storage/cover/'.$serie->artworkInfo->cover)}}" alt="Cover" srcset="" style="width:400px;height:250px; align: center">
            @endif
          </div>
        </div>
        -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Ajouter une Saison</h5>
            <form action="{{Route('admin.season.store')}}" method="POST"  class="row g-3">
              @csrf
              <input type="hidden" name="serie" value="{{$serie->id}}">
              <div class="col-12">
                <label for="inputNanme4" class="form-label">Titre de la Saison</label>
                <input type="text" class="form-control" id="inputNanme4" name="title" required>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </form>
          </div>
        </div>
        
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Ajouter un épisode</h5>

            <!-- Vertical Form -->
            <form action="{{Route('admin.episode.store')}}" method="POST" class="row g-3">
              @csrf
              <input type="hidden" name="serie" value="{{$serie->id}}">
              <div class="col-12">
                <label for="inputNanme4" class="form-label">Titre</label>
                <input required name="title" type="text" class="form-control" id="inputNanme4" required>
              </div>
              <div class="col-12">
                <label for="inputNanme4" class="form-label">Video</label>
                <input required name="video_link" type="text" class="form-control" id="inputNanme4" required>
              </div>
              <div class="col-12">
                <label for="inputNanme4" class="form-label">Saison</label>
                <select class="form-select" id="floatingSelect" aria-label="State" name="season">
                  <option value="" selected>...</option>
                  @foreach ($seasons as $season)
                      <option value="{{$season->id}}" >{{$season->title}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-12">
                <label for="inputAddress" class="form-label">Description</label>
                <textarea class="form-control" placeholder="Description" id="floatingTextarea" style="height: 100px;" name="description" required></textarea>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form><!-- Vertical Form -->

          </div>
        </div>
      </div>
    @foreach ($serie->seasons as $season)
      <div class="col-12">
        <div class="card recent-sales overflow-auto">
          <div class="card-body">
            <h5 class="card-title">
              {{$season->title}}
            </h5>

            <table class="table table-borderless datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Titre</th>
                  <th scope="col">Vidéo</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($season->episodes as $episode)
                  <tr>
                    <th scope="row">{{$episode->id}}</th>
                    <td>{{$episode->title}}</td>
                    <td>
                      <a href="{{$episode->video_link}}" target="_blank" rel="noopener noreferrer">
                        <i class="fas fa-play"></i> Vidéo de l'épisode
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>

          </div>

        </div>
      </div>
    @endforeach
    </div>
</section>

@endsection