@extends('layouts.user')

@section('title', 'Mon compte')

@section('extra-link')
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('extra-script')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection

@section('content')
   <section id="page-header" class="about-header">
        <h2>Nous Contacter</h2>
        <!-- <p>Lorem ipsum, dolor sit amet consectetur </p> -->
        <form action="{{ route('auth.logout') }}" method="post">
        @csrf 
        @method('delete')

        <button class="btn btn-light text-small" style="border-radius: 12px;" onclick="return confirm('Vous allez être déconnecter, OK ?')">Se déconnecter</button>
      </form>
       
    </section>
      
       

      <div class="jumbotron jumbotron-fluid mt-5">
        <div class="container"> 
          <div class="row">
            <div class="col-md-4 col-sm-8">
                <img src="/user/images/Banner/profil.png" alt="" class="rounded-circle">
            </div>
            <div class="col-md-8 col-sm-8">
                <h2 class="display-4 mt-5">{{ Auth::user()->lastname.' '.Auth::user()->firstname}}</h2>
                <div class="u-form u-form-1">
                  <form action="" class="vstack gap-3"  style="padding: 10px;">
                    @csrf
                    <div class="form-group">
                      <label for="email">Adresse e-mail</label>
                      <input type="email" placeholder="Saisir votre adresse adresse e-mail" name="email" class="form-control" value="{{ Auth::user()->email }}">
                    </div>
                    <div class="form-group">
                      <label for="phone">Téléphone</label>
                      <input type="tel" placeholder="Saisir votre téléphone (par ex +21600000000)" name="phone" class="form-control" value="{{ Auth::user()->phone }}">
                    </div>
                    <div class="form-group">
                      <label for="adresse">Adresse</label>
                      <input type="text" name="adresse" class="form-control" placeholder="Saisir votre adresse" value="{{ Auth::user()->address }}">
                    </div>
                  
                    <button class="btn btn-outline-success" style="border-radius: 12px;">Sauvegarder les modifications </button>
                  
                  
                  
                  </form>
                </div>
                <a href="#" class="btn btn-success">changer de mot de passe </a>
            </div>
          </div>
        </div>
      </div>
    
@endsection
 
