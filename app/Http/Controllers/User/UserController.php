<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Models\Cart;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        return view('user.index', [
            'produits' => Produit::where('published', 1)->orderBy('created_at', 'desc')->limit(4)->get(),
        ]);
    }

    public function showPresentation() {
        return view('user.apropos');
    }

    public function showContact() {
        return view('user.contact');
    }

    public function showProduits() {

        return view('user.boutique', [
            'produits' => Produit::where('published', 1)->orderBy('created_at', 'desc')->paginate(8),
        ]);
    }

    public function showProfil() {
        return view('user.profil');
    }

   

    public function showProduit(int $id) {
        
        return view('user.detail', [
            'produit' => Produit::find($id)
        ]);
    }

    public function search(SearchRequest $request) {
        
    }
    
}
