@extends('layouts.admin')

@section('title', 'Gestion des articles')

@section('content')
 
    <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Ajouter un nouveau produit</h5>
              <div class="card">
                <div class="card-body">
                  <form action="{{ route($produit->exists ? 'admin.produit.update' : 'admin.produit.store', $produit)}}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method($produit->exists ? 'put' : 'post')

                    <div class="mb-3">
                      <label for="image" class="form-label">Image</label>
                      <input type="file" class="form-control" id="image" name="image" value="{{ old('image', $produit->imageUrl()) }}">
                      @error('image')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="name" class="form-label">Désignation</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="nom"
                            placeholder="Saisir la désignation de l'article" value="{{ old('name', $produit->name) }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                             @enderror
                        </div>   
                        <div class="mb-3 col">
                            <label for="price" class="form-label">Prix</label>
                            <input type="text" class="form-control" name="price" aria-describedby="price"  placeholder="Saisir le prix de l'article" value="{{ old('price', $produit->price) }}">
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div> 
                    </div>

                    <div class="mb-3">
                        <textarea name="description" id="" class="form-control" placeholder="Saisir la description de l'article">
                         {{ old('description', $produit->description) }}
                        </textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-check form-switch mb-3">
                      <input type="hidden" name="published" value="0"> <!-- Assurez-vous que ce champ est présent pour envoyer la valeur 0 si la case n'est pas cochée -->
                      <input type="checkbox" name="published" class="form-check-input" role="switch" id="published" @if(old('published', $produit->published ?? false)) checked @endif value="1">
                      <!-- Utilisez la fonction old() pour récupérer les valeurs précédentes -->
                      <label class="form-check-label" for="published">Publier</label>

                      @error('published')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
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