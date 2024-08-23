<?php

// CartController.php

namespace App\Http\Controllers;

use App\Models\produits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    // Show panier contents
    public function showPanier()
    {
        return view('panier'); // Ensure this matches the Blade view name for the panier
    }

    // Add product to the panier
    public function addToCart(Request $request, $productId)
    {
        $product = produits::find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Produit non trouvé.');
        }

        $panier = Session::get('productItems', []);

        // Check if the product already exists in the panier
        if (isset($panier[$productId])) {
            // Increase quantity if already in panier
            $panier[$productId]['quantity']++;
        } else {
            $panier[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'image1' => $product->image1,
                'prix' => $product->prix,
                'taille' => $product->taille,
                'Catégorie' => $product->Catégorie,
                'quantity' => 1
            ];
        }

        Session::put('productItems', $panier);

        return redirect()->back()->with('message', 'Produit ajouté au panier.');
    }

    // Remove product from the panier
    public function removeFromCart($productId)
    {
        $panier = Session::get('productItems', []);

        if (isset($panier[$productId])) {
            unset($panier[$productId]);
            Session::put('productItems', $panier);
        }

        return redirect()->back()->with('message', 'Produit retiré du panier.');    }



        public function commande()
    {
        // Fetch all commandes with related products and client details
        $commandes = produits::with(['products', 'client'])->get();

        return view('commande', compact('produits'));
    }
}




