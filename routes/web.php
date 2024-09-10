<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SliderController;




// Show wishlist
Route::get('/wishlist', [CartController::class, 'wishlist'])->name('wishlist');

// Add product to wishlist
Route::post('/wishlist/add/{productId}', [CartController::class, 'add'])->name('wishlist.add');

// Remove product from wishlist
Route::post('/wishlist/remove/{productId}', [CartController::class, 'remove'])->name('wishlist.remove');

// routes/web.php
Route::get('/detail/{id}', [HomeController::class, 'showProductDetail'])->name('detail');
Route::get('/prod', [HomeController::class, 'product']);
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('/commande', [CartController::class, 'showCommandes'])->name('showCommandes');
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::delete('/commande/{id}', [CartController::class, 'destroy'])->name('commande.destroy');


Route::get('/recherche', [HomeController::class, 'recherche'])->name('recherche');

Route::resource('slider', SliderController::class);

Route::get('/order-confirmation/{orderId}', [CartController::class, 'confirmOrder'])->name('order-confirmation');
// routes/web.php

Route::get('/qui-somme-nous', [HomeController::class, 'quiSommeNous'])->name('qui-somme-nous');
Route::get('/livraison-echange', [HomeController::class, 'livraisonEchange'])->name('livraison-echange');
Route::get('/politique-echange', [HomeController::class, 'politiqueEchange'])->name('politique-echange');
Route::get('/terms-conditions', [HomeController::class, 'termsConditions'])->name('terms-conditions');








// Show panier contents
Route::get('/panier', [CartController::class, 'showPanier'])->name('showPanier');

// Add product to panier
Route::post('/panier/add/{productId}', [CartController::class, 'addToCart'])->name('addToCart');

// Remove product from panier
Route::get('/panier/remove/{productId}', [CartController::class, 'removeFromCart'])->name('deleteItem');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/', [HomeController::class, 'welcome']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/panier', [HomeController::class, 'panier']);
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('/login', [HomeController::class, 'login'])->name('login');

// Route for showing client profile, assuming you have a dynamic client ID
Route::get('/client/{clientId}/profile', [HomeController::class, 'showClientProfile'])->name('client.profile');

// Route for dashboard
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');


Route::get('/create',[HomeController::class,'create']);


Route::get('/create', [HomeController::class, 'create'])->name('create'); // Route for displaying the form
Route::post('/create', [HomeController::class, 'store'])->name('store'); // Route for handling form submission
Route::get('/edit/{id}',[HomeController::class, 'edit'])->name('edit');
Route::put('/edit/{id}',[HomeController::class, 'update'])->name('update');
Route::delete('/delete/{id}',[HomeController::class, 'destroy'])->name('product.destroy');
Route::get('/{filename}', [HomeController::class, 'show'])->name('image.show');
Route::get('/products/search', [HomeController::class, 'search'])->name('products.search');

Route::get('/panier', function () {
    return view('panier');
});


Route::get('/searchresult', [HomeController::class, 'searchresult'])->name('searchresult');


















