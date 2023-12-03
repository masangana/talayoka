@extends('layouts.admin.app')

@section('content')

<section class="section">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Aouter un Artiste</h5>
              @if (session('success'))
                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                  Artiste ajouté avec succès
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                        {{$error}}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach
              @endif
              <!-- Floating Labels Form -->
              <form class="row g-3" method="POST" action="{{Route('admin.artist.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="Titre de la série" name="name" required>
                    <label for="floatingName">Nom Complet</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;" name="description"></textarea>
                    <label for="floatingTextarea">Biographie</label>
                  </div>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="form-floating">
                      <input type="date" class="form-control" name="date_of_birth" required>
                      <label for="inputDate" class="col-sm-2 col-form-label">Date de naissance</label>
                    </div>
                </div>
                
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="file" class="form-control" name="picture" required>
                    <label for="inputDate" class="col-sm-2 col-form-label">Photo</label>
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