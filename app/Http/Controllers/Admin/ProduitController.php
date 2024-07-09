<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProduitPostRequest;
use App\Http\Requests\ProduitUpdateRequest;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/* use Illuminate\Support\Str; */

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.produit', [
            'produits' => Produit::orderBy('created_at', 'desc')->paginate(5),
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $produit = new Produit();
        return view('admin.new',[
            'produit' => $produit
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProduitPostRequest $request)
    {
        $data = $request->validated();
        /** @var UploadedFile $image */
        $image = $request->validated('image');
        $imagePath = $image->store('produits', 'public');
        $data['image'] = $imagePath;
        
        Produit::create($data);

        return redirect()->route('admin.produit.index')->with('success', 'Nouveau produit ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        return view('admin.new', [
            'produit' => $produit,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProduitUpdateRequest $request, Produit $produit)
    {
        $produit->update($this->existImage($produit, $request));
        return to_route('admin.produit.index')->with('success', 'Le produit a été modifié avec succès !');
    }

    private function existImage (Produit $produit, ProduitUpdateRequest $request): array{
        $data = $request->validated();

        /** @var UploadedFile|null $image */
        $image = $request->validated(('image'));
        if($image === null || $image->getError()) {
           return $data;
        }

        /** Vérifier s'il existe déjà une image associée et la supprimer */
        if($produit->image) {
            Storage::disk('public')->delete($produit->image);
        }

        $data['image'] = $image->store('produits', 'public');
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

  
}
