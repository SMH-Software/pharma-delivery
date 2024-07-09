<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryRequest;
use App\Models\Delivery;
use Illuminate\Http\Request;

class PriceDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.livraison', [
            'price_delivery' => Delivery::first(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $delivery = new Delivery();
        return view('admin.livraisonf',[
            'price_delivery' => $delivery
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeliveryRequest $request)
    {
        Delivery::create($request->validated());

        return redirect()->route('admin.prix_livraison.index')->with('success', 'Montant ajouté avec succès !');
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
    public function edit(Delivery $delivery)
    {
       

        return view('admin.livraisonf', [
            'price_delivery' => $delivery,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeliveryRequest $request, Delivery $delivery)
    {
        $delivery->update($request->validated());
        return to_route('admin.prix_livraison.index')->with('success', 'Montant modifier avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Delivery::where('id', $id)->delete();
        return back()->with('success', 'Montant supprimé avec succès !');
    }
}
