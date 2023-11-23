@extends('layouts.admin.app')

@section('content')

<section class="section">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Floating labels Form</h5>
  
              <!-- Floating Labels Form -->
              <form class="row g-3" method="POST" action="{{Route('admin.serie.store')}}">
                @csrf
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="Titre de la série" name="title" required>
                    <label for="floatingName">TItre</label>
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
                      <select class="form-select" id="floatingSelect" aria-label="State">
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
                      <input type="text" class="form-control" id="floatingName" placeholder="Your Name">
                      <label for="floatingName">Trailler</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingName" placeholder="Your Name">
                      <label for="floatingName">Réalisateur</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                      <input type="date" class="form-control">
                      <label for="inputDate" class="col-sm-2 col-form-label">Date de Production</label>
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