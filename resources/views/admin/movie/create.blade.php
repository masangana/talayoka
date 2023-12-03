@extends('layouts.admin.app')

@section('content')

<section class="section">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Aouter un film</h5>
              @if (session('success'))
                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                  Film ajouté avec succès
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              @if ($errors->any())
                <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                  Une erreur est survenue lors de l'ajout du film
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              <!-- Floating Labels Form -->
              <form class="row g-3" method="POST" action="{{Route('admin.movie.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="Titre de la série" name="title" required>
                    <label for="floatingName">Titre</label>
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingName" placeholder="Titre de la série" name="video_link" required>
                      <label for="floatingName">Vidéo</label>
                    </div>
                  </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingEmail" placeholder="Slug" name="slug" required>
                    <label for="floatingEmail">Slug</label>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                      <select class="form-select" id="floatingSelect" aria-label="State" name="category_id">
                        <option value="" selected>...</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                      </select>
                      <label for="floatingSelect">Catégorie</label>
                    </div>
                  </div>
                <div class="col-12">
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;" name="description"></textarea>
                    <label for="floatingTextarea">Description</label>
                  </div>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingName" placeholder="Your Name" name="trailler">
                      <label for="floatingName">Trailler</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingName" placeholder="Your Name" name="director">
                      <label for="floatingName">Réalisateur</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                      <input type="date" class="form-control" name="production_date">
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

      </div>
    </div>
</section>

@endsection