<?php

namespace App\Http\Controllers;

use App\Models\produits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
 // Make sure you have this model

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        $total = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['prix'] * $item['quantity']);
        }, 0);

        $products = produits::all(); // Fetch products from the database

        return view('cart.index', compact('cart', 'total', 'products'));
    }

    public function add(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string',
            'prix' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
            'image1' => 'required|string',
        ]);

        $product = $validated;
        $cart = Session::get('cart', []);

        // Check if the product is already in the cart
        $found = false;
        foreach ($cart as &$item) {
            if ($item['id'] == $product['id']) {
                $item['quantity'] += $product['quantity'];
                $found = true;
                break;
            }
        }

        if (!$found) {
            $cart[] = $product;
        }

        Session::put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Product added to cart.');
    }

    public function update(Request $request)
    {
        $cart = Session::get('cart', []);
        $quantities = $request->input('quantities', []);

        foreach ($quantities as $index => $quantity) {
            if (isset($cart[$index])) {
                $cart[$index]['quantity'] = $quantity;
            }
        }

        Session::put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Cart updated.');
    }

    public function remove(Request $request)
    {
        $cart = Session::get('cart', []);
        $index = $request->input('index');

        if (isset($cart[$index])) {
            unset($cart[$index]);
            Session::put('cart', array_values($cart));
        }

        return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
    }
}



