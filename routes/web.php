<?php

use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use App\Models\produits;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;


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
Route::get('/product', [HomeController::class, 'product']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/panier', [HomeController::class, 'panier']);
Route::get('/checkout', [HomeController::class, 'checkout']);
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
Route::get('/slider', [HomeController::class, 'index'])->name('slider.index');
Route::get('/product/{id}/quick-view', [HomeController::class, 'quickView']);

Route::get('/panier', function () {
    return view('panier');
});
Route::post('/add-item', [HomeController::class, 'addItem']);













