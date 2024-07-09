@extends('layouts.admin')

@section('title', 'Gestion des produits')

@section('content')

     <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Gestion des produits</h5>
            <!-- <p class="mb-0">This is a sample page </p> -->

             <div class="row">
                <div class="col-lg-12 d-flex align-items-stretch">
                    <div class="card w-100">
                        <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Tous les produits</h5>
                        <a href="{{ route('admin.produit.create') }}" class="btn btn-primary offset-md-9 mb-3">Nouveau produit</a>
                        <div class="table-responsive">
                            @if($produits->count() > 0)
                                <table class="table text-nowrap mb-0 align-middle">
                                    <thead class="text-dark fs-4">
                                        <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Image</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Désignation</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Prix</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Etat</h6>
                                        </th>
                                        
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Actions</h6>
                                        </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($produits as $produit)
                                            <tr>
                                                <td class="border-bottom-0">
                                                    <img src="{{ $produit->imageUrl() }}" alt="" width="60" height="60">
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-1">PharmaDelivery</h6>
                                                    <span class="fw-normal">{{ $produit->name }}</span>                          
                                                </td>
                                            
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0 fs-4">{{ $produit->price }} DT</h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <span class="badge {{$produit->published === 1 ? 'bg-success':'bg-danger'}} rounded-3 fw-semibold">
                                                            {{$produit->published === 1 ? 'En ligne':'Hors ligne'}}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <a class="me-1 btn btn-warning" href="{{ route('admin.produit.edit', $produit) }}">
                                                        <i class="ti ti-edit"> Modifier</i>
                                                    </a>
                                                </td>
                                            </tr> 
                                        @endforeach
                                            
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-info">Vous n'avez publié aucun article</div>
                            @endif
                        </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        {{ $produits->links() }}
    </div>
  
      
@endsection