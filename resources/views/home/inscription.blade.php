@extends('layouts.home')

@section('title', 'Nouvelle inscription')
@section('link', 'inscription.css')

@section('content')
    <section class="u-clearfix u-image u-valign-top u-section-1" id="sec-e331" data-image-width="750" data-image-height="499">
      <img class="u-image u-image-contain u-image-default u-image-1" src="/home/images/logo.png" alt="" data-image-width="278" data-image-height="291" data-animation-name="customAnimationIn" data-animation-duration="2000" data-animation-delay="0">
      <h3 class="u-custom-font u-text u-text-custom-color-1 u-text-font u-text-1" data-animation-name="customAnimationIn" data-animation-duration="2000" data-animation-delay="0">PharmaDelivery </h3>
      <p class="u-text u-text-2" data-animation-name="customAnimationIn" data-animation-duration="2000" data-animation-delay="0">Santé à portée de clic, livrée 7 jours sur 7 ! </p>
      <img class="custom-expanded u-align-center u-image u-image-contain u-image-default u-image-2" src="/home/images/undraw_Account_re_o7id.png" alt="" data-image-width="1065" data-image-height="598">
      <div class="u-align-center-sm u-align-center-xs u-form u-form-1">
      
        <form action="{{ route('home.inscription') }}" class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" style="padding: 10px" method="post">
          @csrf

          <div class="u-form-group u-form-name u-label-none">
            <input type="text" id="name-3b9a" name="lastname" class="u-border-custom-color-1 u-input u-input-rectangle u-radius u-input-1" placeholder="Saisir votre nom" value="{{ old('nom') }}">
            @error('lastname')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

          <div class="u-form-group u-label-none u-form-group-2">
              <input type="text" placeholder="Saisir votre Prénom" id="text-7f74" name="firstname" class="u-border-custom-color-1 u-input u-input-rectangle u-radius u-input-2" value="{{ old('prenom') }}">
              @error('firstname')
                <small class="text-danger">{{ $message }}</small>
              @enderror
          </div>

          <div class="u-form-email u-form-group u-label-none">
            <input type="email" placeholder="Saisir votre adresse email" id="email-3b9a" name="email" class="u-border-custom-color-1 u-input u-input-rectangle u-radius u-input-3" value="{{ old('email') }}">
            @error('email')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

          <div class="u-form-group u-form-phone u-label-none u-form-group-4">
            <input type="tel" placeholder="Saisir votre téléphone (par ex 00000000)" id="phone-3c8e" name="phone" class="u-border-custom-color-1 u-input u-input-rectangle u-radius u-input-4" value="{{ old('tel') }}">
            @error('phone')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

          <div class="u-form-group u-label-none u-form-group-5">
            <input type="text" placeholder="Saisir votre adresse" id="text-101f" name="address" class="u-border-custom-color-1 u-input u-input-rectangle u-radius u-input-5" value="{{ old('adresse') }}">
            @error('address')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

          <div class="u-form-group u-label-none u-form-group-6">
            <input type="password" placeholder="Saisir votre mot de passe" id="text-b027" name="password" class="u-border-custom-color-1 u-input u-input-rectangle u-radius u-input-6">
            @error('password')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

          <div class="u-align-left u-form-group u-form-submit">
            <button class="u-btn u-btn-submit u-button-style u-custom-color-2 u-hover-custom-color-1 u-btn-1" style="border-radius: 12px;">s'inscrire maintenant</button>
          </div>
            
          
        </form>
      </div>
      <p class="u-align-center u-text u-text-3">Déja inscrit ?&nbsp;<a href="{{ route('home.login') }}" class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-custom-color-1 u-btn-2">Se connecter</a>
      </p>
    </section>
   
    
@endsection