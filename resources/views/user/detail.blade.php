@extends('layouts.user')

@section('title', 'Detail')

@section('extra-link')
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('extra-script')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection

@section('content')
    @if(session('error'))
        <div class="container alert alert-danger text-center mt-5 mb-5">{{session('error')}}</div>
    @endif
   <section id="prodetail" class="section-p1">
      
            <div class="single-pro-image">
                <img src="{{ $produit->imageUrl() }}" width="100%" id="mainImg" alt="IMAGE">
                
            </div>
            <div class="single-pro-detail">
                <h6>PharmaDelivery</h6>
                <h4>{{ $produit->name }}</h4>
                <h2>{{ number_format($produit->price, 3, ',') }} TND</h2>
                
                <form action="{{ route('user.panier.store') }}" method="post">
                    @csrf
                    <input type="text" value="{{ $produit->id }}" name="reference" hidden>
                 
                    <input type="number" value="1" name="quantity" min="1" max="3">
                    <button class="normal"> Ajouter au Panier</button>

                    @error('quantity')
                        <span class="badge bg-danger text-md">{{$message}}</span>
                    @enderror
                </form>
                <h4>Details Produit</h4>
                <p><strong>Description</strong> <br> {{ $produit->description }}</p>
            </div>
      
   </section>

@endsection