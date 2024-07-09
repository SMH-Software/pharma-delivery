<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Http\Requests\QuantityUpdateRequest;
use App\Models\Cart;
use App\Models\Delivery;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cartItems = Cart::where('owner', Auth::user()->email)->get();
        // Initialiser la variable pour la somme des sous-totaux
        $subtotals = 0;

        // Parcourir les éléments du panier pour calculer la somme des sous-totaux
        foreach ($cartItems as $item) {
            $subtotals += $item->price * $item->quantity;
        }
        
        return view('user.panier', [
            'carts' => Cart::where('owner', Auth::user()->email)->orderBy('created_at', 'desc')->paginate(5),
            'total_card' => Cart::where('owner', Auth::user()->email),
            'subtotals' => $subtotals,
            'price_delivery' => Delivery::first(),
                       
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CartRequest $request)
    {
        $product = Produit::find($request->validated('reference'));

        $cart_exist = Cart::where('reference', $request->validated('reference'))
                    ->where('owner', Auth::user()->email)
                    ->get();

        if(!$cart_exist->isEmpty()){
            return redirect()->route('user.detail', $request->validated('reference'))->with('error', 'Le produit a déjà été ajouté à votre panier');
        }
              
        Cart::create([
            'reference' => $request->validated('reference'),
            'name' =>  $product->name,
            'price' =>  $product->price,
            'quantity' => $request->validated('quantity'),
            'image' =>  $product->image,
            'owner' =>  Auth::user()->email,
        ]);

        return redirect()->route('user.panier.index');
        
       
      
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Cart $cart, QuantityUpdateRequest $request, string $id)
    {
        // Récupérer le panier avec l'identifiant fourni
        $cart = Cart::findOrFail($id);

        // Récupérer les données à partir de notre requête fetch
        $data = $request->json()->all();

        // Utiliser la méthode update pour mettre à jour la quantité du panier
        $cart->update(['quantity' => $data['quantity']]);

        // Vous pouvez renvoyer une réponse JSON si nécessaire
        return response()->json(['message' => 'Cart updated successfully'], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cart::where('id', $id)->delete();
        return back()->with('success', 'Le produit a été supprimé avec succès !');
    }
}
