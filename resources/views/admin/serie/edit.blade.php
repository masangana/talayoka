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
        <div class="card">
          <br>
          <div class="card-body">
            @if(optional($serie->artworkInfo)->cover)
              <img src="{{asset('storage/cover/'.$serie->artworkInfo->cover)}}" alt="Cover" srcset="" style="width:400px;height:250px; align: center">
            @endif
          </div>
        </div>
      </div>

      <div class="col-12">
        <div class="card recent-sales overflow-auto">
          <div class="card-body">
            <h5 class="card-title">Recent Sales <span>| Today</span></h5>

            <table class="table table-borderless datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Customer</th>
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row"><a href="#">#2457</a></th>
                  <td>Brandon Jacob</td>
                  <td><a href="#" class="text-primary">At praesentium minu</a></td>
                  <td>$64</td>
                  <td><span class="badge bg-success">Approved</span></td>
                </tr>
                <tr>
                  <th scope="row"><a href="#">#2147</a></th>
                  <td>Bridie Kessler</td>
                  <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                  <td>$47</td>
                  <td><span class="badge bg-warning">Pending</span></td>
                </tr>
                <tr>
                  <th scope="row"><a href="#">#2049</a></th>
                  <td>Ashleigh Langosh</td>
                  <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                  <td>$147</td>
                  <td><span class="badge bg-success">Approved</span></td>
                </tr>
                <tr>
                  <th scope="row"><a href="#">#2644</a></th>
                  <td>Angus Grady</td>
                  <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                  <td>$67</td>
                  <td><span class="badge bg-danger">Rejected</span></td>
                </tr>
                <tr>
                  <th scope="row"><a href="#">#2644</a></th>
                  <td>Raheem Lehner</td>
                  <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                  <td>$165</td>
                  <td><span class="badge bg-success">Approved</span></td>
                </tr>
              </tbody>
            </table>

          </div>

        </div>
      </div>
    </div>
</section>

@endsection