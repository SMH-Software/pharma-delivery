<?php

use App\Http\Controllers\Admin\DashController;
use App\Http\Controllers\Admin\PriceDeliveryController;
use App\Http\Controllers\Admin\ProduitController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;


Route::name('home.')->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('login');
    Route::get('/inscription', [HomeController::class, 'create'])->name('inscription');
    Route::post('inscription', [HomeController::class, 'store'])->name('inscription');
});

Route::name('auth.')->group(function() {
    Route::post('/login', [AuthController::class, 'doLogin'])->name('login');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [DashController::class, 'index'])->name('index');
    Route::get('/commandes', [DashController::class, 'showOrders'])->name('commande');
    Route::resource('produit', ProduitController::class);
    Route::resource('prix_livraison', PriceDeliveryController::class);
});

Route::prefix('user')->name('user.')->middleware('auth')->group(function () {
    Route::get('/accueil', [UserController::class, 'index'])->name('index');
    Route::get('/presentation', [UserController::class, 'showPresentation'])->name('presentation');
    Route::get('/contactez-vous', [UserController::class, 'showContact'])->name('contact');
    Route::get('/profil', [UserController::class, 'showProfil'])->name('profil');
    Route::get('/boutique', [UserController::class, 'showProduits'])->name('produit');
    Route::get('/produit/{id}', [UserController::class, 'showProduit'])->name('detail');
    Route::post('/valider-panier', [CheckoutController::class, 'checkout'])->name('checkout');


    Route::resource('panier', CartController::class);
    
    /* Route::post('/recherche', [UserController::class, 'search'])->name('search'); */
});
