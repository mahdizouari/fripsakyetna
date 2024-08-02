<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function showCart()
    {
        $cartItems = Session::get('cartItems', []);
        return view('cart', compact('cartItems'));
    }

    // CartController.php
public function addItem(Request $request)
{
    $validated = $request->validate([
        'id' => 'required|integer',
        'name' => 'required|string',
        'image1' => 'required|string',
        'prix' => 'required|numeric',
        'taille' => 'required|string',
        'Catégorie' => 'required|string',
    ]);

    $productData = [
        'id' => $validated['id'],
        'name' => $validated['name'],
        'image1' => $validated['image1'],
        'prix' => $validated['prix'],
        'taille' => $validated['taille'],
        'Catégorie' => $validated['Catégorie'],
    ];

    $cartItems = Session::get('cartItems', []);

    if (!array_key_exists($productData['id'], $cartItems)) {
        $cartItems[$productData['id']] = $productData;
    }

    Session::put('cartItems', $cartItems);

    return redirect('/cart')->with('message', 'Item added to cart!');
}


    public function removeFromCart(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer',
        ]);

        $cartItems = Session::get('cartItems', []);
        $cartItems = array_filter($cartItems, function ($item) use ($validated) {
            return $item['id'] != $validated['id'];
        });

        Session::put('cartItems', $cartItems);

        return redirect()->route('cart.show')->with('message', 'Item removed from cart!');
    }


    
}
