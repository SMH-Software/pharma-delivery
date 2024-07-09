@extends('layouts.admin')

@section('title', 'Gestion de prix de livraison')

@section('content')
   <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Gestion du montant de livraison</h5>
            <!-- <p class="mb-0">This is a sample page </p> -->

             <div class="row">
                <div class="col-lg-12 d-flex align-items-stretch">
                    <div class="card w-100">
                        <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Montant de livraison actuel</h5>
                        @if(session('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                        @endif

                        @if(!$price_delivery)
                            <a href="{{ route('admin.prix_livraison.create') }}" class="btn btn-primary offset-md-9 mb-3">Ajouter</a>
                        @endif

                        <div class="table-responsive">
                            @if($price_delivery)
                                <table class="table text-nowrap mb-0 align-middle">
                                    <thead class="text-dark fs-4">
                                        <tr>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Montant</h6>
                                            </th>
                                           
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Actions</h6>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                        <tr>
                                            
                                            <td class="border-bottom-0">
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="badge bg-success rounded-3 fw-semibold">
                                                        {{ number_format($price_delivery->amount, 3,',') }} TND
                                                    </span>
                                                </div>
                                            </td>

                                            <td class="border-bottom-0 d-flex">
                                                <a class="me-1 btn btn-warning" href="{{ route('admin.prix_livraison.edit', $price_delivery->id) }}">
                                                    <i class="ti ti-edit"> Modifier</i>
                                                </a>

                                                <form action="{{ route('admin.prix_livraison.destroy', $price_delivery->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                     <button class="me-1 btn btn-danger" onclick="return confirm('Suppression en cours, OK ?')">
                                                    <i class="ti ti-trash"> Supprimer</i>
                                                    </button>
                                               </form>

                                            </td>

                                           
                                        </tr> 
                                      
                                            
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-info">Aucun prix de livraion n'a été ajouté</div>
                            @endif
                        </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>

@endsection