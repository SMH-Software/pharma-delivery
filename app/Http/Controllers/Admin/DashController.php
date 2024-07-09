<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function index() {
        return view('admin.index', [
            'online_product' => Produit::where('published', 1),
        ]);
    }

    public function showOrders() {
        return view('admin.commande');
    }
}
