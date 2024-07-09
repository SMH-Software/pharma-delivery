@extends('layouts.admin')

@section('title', 'Gestion de prix de livraison')

@section('content')
   <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Ajouter le montant de la livraison</h5>
            <!-- <p class="mb-0">This is a sample page </p> -->

                <form action="{{ route($price_delivery->exists ? 'admin.prix_livraison.update' : 'admin.prix_livraison.store', $price_delivery)}}" method="post">
                    @csrf
                    @method($price_delivery->exists ? 'put' : 'post')

                    <div class="mb-3 col">
                        <input type="text" class="form-control" name="amount" id="amount" aria-describedby="nom"
                        placeholder="Saisir le montant de la livraison" value="{{ old('amount', $price_delivery->amount) }}">
                        @error('amount')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Ajouter maintenant</button>
                  </form>
          </div>
        </div>
      </div>

@endsection