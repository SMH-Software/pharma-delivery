@extends('layouts.pharmacie')

@section('title', 'Gestion des articles')

@section('content')
    
   <!--  <h1>Gestion des articles</h1>
    <hr>
    <div class="col-md-4 offset-md-10">
        <a href="#" class="btn btn-primary mb-5">Nouvel article <i class="ti ti-plus"></i></a>
    </div> -->


    <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Ajouter un nouveau produit</h5>
              <div class="card">
                <div class="card-body">
                  <form action="{{ route('pharmacie.produit.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="mb-3">
                      <label for="image" class="form-label">Image</label>
                      <input type="file" class="form-control" id="image" name="image">
                      @error('image')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="name" class="form-label">Désignation</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="nom"
                            placeholder="Saisir la désignation de l'article">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                             @enderror
                        </div>   
                        <div class="mb-3 col">
                            <label for="price" class="form-label">Prix</label>
                            <input type="number" class="form-control" name="price" id="price" aria-describedby="price"  placeholder="Saisir le prix de l'article">
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div> 
                    </div>

                    <div class="mb-3">
                        <textarea name="description" id="" class="form-control" placeholder="Saisir la description de l'article">
                        </textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                   
                    <!-- <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->
                    <button type="submit" class="btn btn-primary">Ajouter maintenant</button>
                  </form>
                </div>
              </div>
              
              
            </div>
          </div>
        </div>
    </div>
   

  
@endsection