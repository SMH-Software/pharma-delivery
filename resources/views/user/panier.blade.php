@extends('layouts.user')

@section('title', 'Panier')

@section('extra-meta')
   <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('extra-link')
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('extra-script')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection

@section('content')

    <section id="page-header" class="about-header">
        <h2>Panier ({{$total_card->count()}})</h2>
       <!--  <p>Lorem ipsum, dolor sit amet consectetur </p> -->
       
    </section>

    @if($carts->count() > 0)

         <section id="cart" class="section-p1">
            @error('quantity')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror

            @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif

            <table width="100%">
                <thead class="thead text-center">   
                    <th>Supprimer</th>
                    <th>Image</th>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Sous-Total</th>
                </thead>
                <tbody> 
                @foreach($carts as $cart)
                        <tr>
                            <td>
                                <form action="{{ route('user.panier.destroy', $cart->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Le produit selectionné va être supprimer de votre panier, OK ?')"><i class="fa-solid fa-circle-xmark"></i></button>
                                </form>
                            </td>
                            <td><img src="{{ $cart->imageUrl() }}" alt=""></td>
                            <td>{{ $cart->name }}</td>
                            <td>{{ number_format($cart->price, 3, ',') }} TND</td>

                            <td>
                                <select name="quantity" id="quantity" class="form-select" data-id="{{$cart->id}}">
                                    @for($i = 1; $i <= 3; $i++)
                                        <option value="{{ $i }}" {{$cart->quantity === $i ? 'selected':''}}>{{ $i }}<option>
                                    @endfor
                                </select>
                            </td>
                           <!--  <td><input type="number" value="" min="1" max="3"></td> -->
                            <td>{{ number_format($cart->price * $cart->quantity, 3, ',')}} TND</td>
                        </tr>
                
                @endforeach
                
                </tbody>
            </table>
        </section>

        <section id="cart-add" class="section-p1">
            <div id="coupon">
                <h3>Applique Coupon</h3>
                <div>
                <input type="text" placeholder="Entrer Votre Coupon"> 
                <button class="normal">Apliquer</button>
                </div>
            </div>
            @php
                $tva = ($subtotals * 18) / 100;
                $subtotals_reel = $subtotals - $tva;
                $ttc = $subtotals + $price_delivery->amount;
            @endphp

            <div id="subtotal">
                <h4>DETAILS DE LA COMMANDE</h4>
                <table>
                    <tr>
                        <td><strong>Sous Total</strong></td>
                        <td>{{ number_format($subtotals, 3, ',') }} TND</td>
                    </tr>
                    <tr>
                        <td><strong>Livraison</strong></td>
                        <td><span class="badge bg-dark">{{number_format($price_delivery->amount, 3, ',')}} TND</span></td>
                    </tr>
                    <tr>
                        <td><strong>Paiement</strong></td>
                        <td>Comptant à la livraison</td>
                    </tr>

                    <!-- <tr>
                        <td><strong>TVA</strong></td>
                        <td class="text-success"><span class="badge bg-dark">18% ({{number_format($tva, 3, ',')}} TND)</span> </td>
                    </tr> -->
                    <tr>
                        <td><strong>Total TTC</strong></td>
                        <td> <span class="badge bg-success">{{ number_format($ttc  , 3, ',')}} TND</span></td>
                    </tr>
                </table>
                <!-- <button class="normal">Commander maintenant</button> -->
                <button class="normal" data-bs-toggle="modal" data-bs-target="#exampleModal">Commander maintenant</button>

                <!-- Modal -->
               <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Validez votre commande</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('user.checkout')}}" class="" method="post">
                            @csrf
                            <h5>Informations personnelles</h5>
                            <div class="form-group mb-2">
                                <label for="">Nom</label>
                                <input type="text" name="lastname" class="form-control mb-2" value="{{ Auth::user()->lastname }}" readonly>
                            </div>
                             <div class="form-group mb-2">
                                <label for="">Prénom</label>
                                <input type="text" name="firstname" class="form-control mb-2" value="{{ Auth::user()->firstname }}" readonly>
                            </div>
                            <hr>
                            <h5 class="mb-0">Informations de la livraison</h5>
                            <div class="form-group mb-2">
                                <label for="">Adresse</label>
                                <input type="text" name="address" class="form-control" value="{{ Auth::user()->address }}">  
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Téléphone</label>
                                <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone }}">
                            </div>

                            <button class="btn btn-success" >Valider votre commande</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Fermer</button>
                    </div>
                    </div>
                </div>
                </div>     
            </div>
        </section>

    @else
       <div class="container">
             <div class="alert alert-success text-center mt-5 mb-5">Il n'y a aucun produit dans votre panier</div>

            <div id="subtotal">
                <h4>TOTAL PANIER</h4>
                <table>
                    <tr>
                        <td><strong>Sous Total</strong></td>
                        <td>{{ number_format(0, 3, ',') }} TND</td>
                    </tr>
                    
                    <tr>
                        <td><strong>Total TTC</strong></td>
                        <td> <span class="badge bg-dark">{{ number_format(0  , 3, ',')}} TND</span></td>
                    </tr>
                </table> 
            </div>
       </div>
    @endif
@endsection

@section('extra-js')
  <script>
        let selects = document.querySelectorAll('#quantity')
       
        
        selects.forEach((element) => {
            element.addEventListener('change', function (e) {
                let id = e.target.getAttribute('data-id')
                console.log(id)
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

                /* console.log(`J\'ai été selectionne et me voici ${element.value}`) */
                fetch(`/user/panier/${id}`,
                    {
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json, text-plain, */*',
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': token,

                        },
                        method: 'put',
                        body: JSON.stringify({
                            quantity: element.value
                        })

                    }
                ).then((data) => {
                    console.log(data)
                    location.reload()
                }).catch((error) => {
                    console.log(error)
                })
            })
        })
  </script>
@endsection

