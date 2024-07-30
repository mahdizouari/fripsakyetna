<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produits;

class CartController extends Controller
{
    public function index()
    {
        $products = produits::all();
        return view('product', compact('products'));
    }

    public function cart()
{
    $cart = session()->get('cart', []);
    $total = array_reduce($cart, function ($carry, $item) {
        return $carry + ($item['prix'] * $item['quantity']);
    }, 0);
    
    return view('cart.index', compact('cart', 'total'));
}

    public function add($id)
    {
        $product = produits::find($id);

        if (!$product) {
            abort(404);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "prix" => $product->prix,
                "image1" => $product->image1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if ($request->ajax()) {
            $productId = $request->input('id'); // Ensure this matches your JavaScript variable name
            $cart = session()->get('cart', []); // Default to an empty array if no cart exists
    
            if (isset($cart[$productId])) {
                unset($cart[$productId]);
                session()->put('cart', $cart);
    
                // Optionally return the new cart total or other data
                $newTotal = array_reduce($cart, function ($carry, $item) {
                    return $carry + ($item['prix'] * $item['quantity']);
                }, 0);
    
                return response()->json(['success' => true, 'newTotal' => $newTotal]);
            }
    
            return response()->json(['success' => false], 400);
        }
    
        return response()->json(['success' => false], 400);
    }
    

  

}

