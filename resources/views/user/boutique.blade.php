@extends('layouts.user')

@section('title', 'Boutique')

@section('extra-link')
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('extra-script')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection

@section('content')

    <section id="page-header">
        <h2>Tous nos produits</h2>
       
    </section>

    <section id="search" class="section-p1">
        
        <form action="">
            <input type="text" placeholder="Tapez pour rechercher un produit">
            <button type="submit" class="search">rechercher</button>
        </form>
    </section>

    <section id="product" class="section-p1">
        <div class="pro-container">
            @forelse($produits as $produit)
                <div class="pro" onclick="window.location.href=`{{ route('user.detail', $produit->id) }}`">
                    <img src="{{$produit->imageUrl()}}" alt="IMAGE PRODUIT">
                    <div class="des">
                        <span>PharmaDelivery</span>
                        <h5>{{$produit->name}}</h5>
                       
                        <h4>{{ number_format($produit->price, 3, ',')}} TND</h4>
                    </div>
                    <a href="#" class="cart"><i class="fa fa-shopping-cart"></i></a>
                </div>
            @empty
                <h1>Produit indisponible</h1>
            @endforelse
           
        </div>
    </section>

    <!-- <section id="pagination" class="section-p1">
      
    </section> -->

    <div class="container">
        {{ $produits->links() }}
    </div>

   @endsection