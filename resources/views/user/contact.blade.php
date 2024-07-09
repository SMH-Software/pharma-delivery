@extends('layouts.user')

@section('title', 'Contactez-nous')

@section('content')

    <section id="page-header" class="about-header">
        <h2>Nous Contacter</h2>
        <!-- <p>Lorem ipsum, dolor sit amet consectetur </p> -->
       
    </section>

    <section id="contact-detail" class="section-p1">
        <div class="detail">
            <span>GET IN TOUCH</span>
            <h2>Lorem ipsum dolor sit amet deleniti expedita</h2>
            <h3>Lorem ipsum dolor</h3>
            <div>
                <li>
                    <i class="fa-solid fa-map"></i>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicin</p>
                </li>
                <li>
                    <i class="fa-solid fa-envelope"></i>
                    <p>contact@exemple.com</p>
                </li>
                <li>
                    <i class="fa-solid fa-phone"></i>
                    <p>(+216) 00 000 000</p>
                </li>
                <li>
                    <i class="fa-solid fa-clock"></i>
                    <p>Lundi - Samedi : 9h - 18h</p>
                </li>
            </div>
        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25530.91893641301!2d10.152194520779517!3d36.88161874295621!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12e2cca01c077c9b%3A0xe44c08814169b85d!2sRiadh%20Andalous%2C%20Ariana!5e0!3m2!1sfr!2stn!4v1680586216242!5m2!1sfr!2stn" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        
    </section>

    <section id="form-detail">
        <form action="">
            <span>LAISSE UN MESSAGE</span>
            <h2>Lorem ipsum dolor sit amet</h2>
            <input type="text" placeholder="Votre nom">
            <input type="email" placeholder="E-mail">
            <input type="text" placeholder="Objet">
            <textarea name="" id="" cols="30" rows="10" placeholder="Message"></textarea>
            <button class="normal">Soumettre</button>
        </form>
        <div class="people">
            <div>
                <img src="images/Banner/avatar1.png" alt="AVATAR">
                <p>
                    <span>John Does</span> Responsable Marketing <br> 
                    Téléphone : +216 00 000 000 <br>
                    E-mail : reponsable@exemple.com
                </p>
            </div>
            <div>
                <img src="images/Banner/avatar1.png" alt="AVATAR">
                <p>
                    <span>John Does</span> Responsable Marketing <br> 
                    Téléphone : +216 00 000 000 <br>
                    E-mail : reponsable@exemple.com
                </p>
            </div>
            <div>
                <img src="images/Banner/avatar1.png" alt="AVATAR">
                <p>
                    <span>John Does</span> Responsable Marketing <br> 
                    Téléphone : +216 00 000 000 <br>
                    E-mail : reponsable@exemple.com
                </p>
            </div>
        </div>
    </section>

@endsection

    
