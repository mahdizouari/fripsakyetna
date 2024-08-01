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

    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string',
            'image' => 'required|string',
            'prix' => 'required|numeric',
            'taille' => 'required|string',
            'Catégorie' => 'required|string',
        ]);

        $cartItems = Session::get('cartItems', []);
        $cartItems[] = $validated;

        Session::put('cartItems', $cartItems);

        return redirect()->route('cart.show')->with('message', 'Item added to cart!');
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
