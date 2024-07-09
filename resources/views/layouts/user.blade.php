<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('extra-meta')
    <title>@yield('title') - PharmaDelivery</title>
    <link rel="shortcut icon" href="/user/images/Header/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="/user/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    @yield('extra-link')
</head>
<body>
    <section class="header-top">
       <!--  <form action="">
            <a type="button"><i class="fa fa-sign-out"></i> Se déconnecter</a>
        </form> -->
        <a href="{{ route('user.profil') }}"><i class="fa fa-user-large" aria-hidden="true"></i> Mon compte</a>        
    </section>

    <section id="header">
        
        <a href="{{ route('user.index') }}"><img src="/user/images/Header/logo.png" alt="LE LOGO" class="logo" width="80" height=""></a>

        <div>
            <ul id="navbar">       
                <li> <a class="active" href="{{ route('user.index') }}">ACCUEIL</a></li>
                <li><a class="" href="{{ route('user.produit') }}">BOUTIQUE</a></li>
                <li><a class="" href="{{ route('user.contact') }}">CONTACT</a></li> 
                <li><a class="" href="{{ route('user.presentation') }}">A PROPOS</a></li>
                <li id="lg-bag">
                    <a class="active" href="{{ route('user.panier.index') }}">
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    </a>
                </li>
                <a href="#" id="close"><i class="fa-regular fa-circle-xmark"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="{{ route('user.panier.index') }}"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    @yield('content')

    <section id="newsletters" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Souscrivez à notre Newsletters</h4>
            <p>Recevoir des mises à jour par E-mail sur nos actualités et <span> offres spéciales</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Votre adresse E-mail">
            <button class="normal">Soumettre</button>
        </div>
    </section>
    
    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="/user/images/Header/logo.png" alt="LOGO" width="80" height="">
            <h4>Contact</h4><!-- 
            <p><strong>Adresse: </strong> 46 RUE Avenue Cité El Kadra</p> -->
            <p><strong>Téléphone: </strong> (+216) 00 000 000 / 00 000 000</p>
            <p><strong>Heures: </strong> H24/24, Lundi - Lundi</p>
    
            <div class="follow">
                <h4>Suivez-nous</h4>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-youtube"></i>
            </div>
        </div>
       
        
        <div class="col">
            <h4>A propos</h4>
            <a href="{{ route('user.presentation')}}">Qui sommes-nous</a>
            <a href="#">Politique de confidentialité</a>
            <a href="#">Termes et Conditions</a>
            <a href="contact.html">Nous contacter</a>
        </div>
        <div class="col">
            <h4>Mon compte</h4>
            <a href="{{ route('user.panier.index')}}">Consulter mon panier</a>
            <a href="#">Liste de souhaits</a>
            <a href="#">Suivre ma commande</a>
            <a href="#">Aide</a>
        </div>
        <div class="col install">
            <h4>Paiement Sécurisé</h4>
            <img src="/user/images/footer/pay.jpg" alt="PAIEMENT IMAGE">
    
        </div>
        <div class="copy-right">
            <p> © 2024. PharmaDelivery.tn - Design By SMH-Software</p>
        </div>
    </footer>
    
    
    
    @yield('extra-script')
   
    <script src="/user/script.js"></script>
    @yield('extra-js')

</body>
</html>

    
