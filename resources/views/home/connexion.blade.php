@extends('layouts.home')

@section('title', 'Se connecter')
@section('link', 'connexion.css')

@section('content')
    <section class="u-clearfix u-image u-section-1" id="sec-e331" data-image-width="750" data-image-height="499">
      <img class="u-image u-image-contain u-image-default u-image-1" src="/home/images/logo.png" alt="" data-image-width="278" data-image-height="291" data-animation-name="customAnimationIn" data-animation-duration="2000" data-animation-delay="0">
      <h3 class="u-custom-font u-text u-text-custom-color-1 u-text-font u-text-1" data-animation-name="customAnimationIn" data-animation-duration="2000" data-animation-delay="0">PharmaDelivery </h3>
      <p class="u-align-center-xs u-text u-text-2" data-animation-name="customAnimationIn" data-animation-duration="2000" data-animation-delay="0">Santé à portée de clic, livrée 7 jours sur 7 ! </p>
      <img class="custom-expanded u-align-center u-image u-image-contain u-image-default u-image-2" src="/home/images/undraw_Access_account_re_8spm__1_-removebg-preview.png" alt="" data-image-width="503" data-image-height="496">
      <div class="u-form u-form-1">
        @if(session('success'))
          <small class="text-md text-success text-center">{{session('success')}}</small>
        @endif
        <form action="{{ route('auth.login') }}" class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" style="padding: 10px" method="post">
          @csrf
          <div class="u-form-email u-form-group u-label-none">
            <input type="email" placeholder="Saisir votre adresse email" id="email-3b9a" name="email" class="u-border-custom-color-1 u-input u-input-rectangle u-radius u-input-1" value="{{ old('email', session('email') ? session('email'):'') }}">
            @error('email')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="u-form-group u-label-none u-form-group-2">
            <input type="password" placeholder="Saisir votre mot de passe" id="text-b027" name="password" class="u-border-custom-color-1 u-input u-input-rectangle u-radius u-input-2">
            @error('password')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

          <div class="u-align-left u-form-group u-form-submit">
           <button class="u-btn u-btn-submit u-button-style u-custom-color-2 u-hover-custom-color-1 u-btn-1" style="border-radius: 12px;">se connecter</button>
          </div>
          
         
        </form>
      </div>
      <p class="u-align-center u-text u-text-3">Pas encore inscrit ?&nbsp;<a href="{{ route('home.inscription') }}" class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-custom-color-1 u-btn-2">S'inscrire </a>
      </p>
      
    </section>
  
    
    
@endsection