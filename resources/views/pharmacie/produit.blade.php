@extends('layouts.pharmacie')

@section('title', 'Gestion des produits')

@section('content')

     <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Gestion des produits</h5>
           <!--  <p class="mb-0">This is a sample page </p> -->
            <div class="col-md-4 offset-md-10">
                <a href="{{ route('pharmacie.produit.create') }}" class="btn btn-primary mb-5">Nouveau produit <i class="ti ti-plus"></i></a>
            </div>
            <div class="row">
                @forelse($produits as $produit)
                    <div class="col-sm-6 col-xl-3">
                    <div class="card overflow-hidden rounded-2">
                        <div class="position-relative">
                        <a href="javascript:void(0)"><img src="../assets/images/products/s4.jpg" class="card-img-top rounded-0" alt="..."></a>
                        <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>                      </div>
                        <div class="card-body pt-3 p-4">
                        <h6 class="fw-semibold fs-4">Boat Headphone</h6>
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="fw-semibold fs-4 mb-0">$50 <span class="ms-2 fw-normal text-muted fs-3"><del>$65</del></span></h6>
                            <ul class="list-unstyled d-flex align-items-center mb-0">
                            <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                            <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                            <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                            <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                            <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    </div>
                @empty
                    <div class="alert alert-info">Vous n'avez publié aucun article</div>
                @endforelse
        
            </div>

          </div>
        </div>

        {{ $produits->links() }}
    </div>
      
@endsection