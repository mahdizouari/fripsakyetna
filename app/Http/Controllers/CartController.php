<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produits; 
// Ensure you use the correct namespace for your Product model

class CartController extends Controller
{
    // Display all products
    public function index()
    {
        $products = produits::all();
        return view('product', compact('products'));
    }

    // Display the cart
    public function cart()
    {
        $cart = session()->get('cart', []);
        dd($cart); // Dump the cart to check its contents
    
        $total = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['prix'] * $item['quantity']);
        }, 0);
    
        return view('cart', compact('cart', 'total'));
    }
    

    // Add a product to the cart
    public function add($id)
    {
        $product = produits::find($id);

        if (!$product) {
            abort(404);
        }

        $cart = session()->get('cart', []);

        // If the cart is empty, add the first product
        if (!$cart) {
            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "prix" => $product->prix,
                    "image1" => $product->image1
                ]
            ];

            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // If the cart is not empty, check if the product exists, then increment the quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // If the product does not exist in the cart, add it with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "prix" => $product->prix,
            "image1" => $product->image1
        ];

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    // Update the quantity of a product in the cart
    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    // Remove a product from the cart
    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
