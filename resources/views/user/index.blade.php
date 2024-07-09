@extends('layouts.user')

@section('title', 'Accueil')

@section('content')

   

    <section id="hero">
        <h4>Santé à portée de clic, livrée 7 jours sur 7 !</h4>
        <h1>PharmaDelivery</h1>
        <p>Votre partenaire pour une vie plus saine et plus heureuse</p>
        <button>Commencez</button>
    </section>

    <section id="product" class="section-p1">
        <h2>Produits récents</h2>
        <p>PharmaDelivery</p>
        <div class="pro-container">
            @forelse($produits as $produit)
                <div class="pro" onclick="window.location.href=`{{ route('user.detail', $produit->id) }}`">
                    <img src="{{$produit->imageUrl()}}" alt="IMAGE PRODUIT">
                    <div class="des">
                        <span>PharmaDelivery</span>
                        <h5>{{$produit->name}}</h5>
                        <!-- <div class="star">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div> -->
                        <h4>{{number_format($produit->price, 3, ',')}} TND</h4>
                    </div>
                    <a href="#" class="cart"><i class="fa fa-shopping-cart"></i></a>
                </div>
            @empty
                <h1>Produit indisponible</h1>
            @endforelse
        </div>
    </section>

    <section id="banner" class="section-m1">
        <h4>Service Promotion</h4>
        <h2>Jusqu'à <span> 70% de Réduction</span> - Tous les Produits</h2>
        <button class="normal ">En savoir plus</button>
    </section>
    
    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="images/Allf/f1.jpg" alt="Feature Image 1" width="100" height="80">
            <h6>Livraison gratuite</h6>
         </div>
         <div class="fe-box">
            <img src="images/Allf/f2.png" alt="Feature Image 1" width="100" height="80">
            <h6>Commandes en ligne</h6>
         </div>
         <div class="fe-box">
            <img src="images/Allf/f3.png" alt="Feature Image 1" width="100" height="80">
            <h6>Paiement sécurisé</h6>
         </div>
         <div class="fe-box">
            <img src="images/Allf/f4.png" alt="Feature Image 1" width="100" height="80">
            <h6>Solde</h6>
         </div>
         <div class="fe-box">
            <img src="images/Allf/f5.png" alt="Feature Image 1" width="100" height="80">
            <h6>Bonne vente</h6>
         </div>
         <div class="fe-box">
            <img src="images/Allf/f6.png" alt="Feature Image 1" width="100" height="80">
            <h6>Support H24/7</h6>
         </div>
    </section>
@endsection
   