<?php

// CartController.php

namespace App\Http\Controllers;

use App\Models\produits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\commande;

class CartController extends Controller
{
    // Show panier contents
    public function showPanier()
    {
        $cartCount = $this->getCartCount(); // Calculate the cart count

        return view('panier'); // Ensure this matches the Blade view name for the panier
    }
    public function getCartCount()
    {
        $panier = Session::get('productItems', []);
        return array_sum(array_column($panier, 'quantity'));
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

        return redirect()->back()->with('message', 'Produit retiré du panier.');   
    }


    
public function commande(){
    return view('commande');
}
public function checkout(Request $request)
{
    // Retrieve cart items from session
    $panier = Session::get('productItems', []);

    if (empty($panier)) {
        return redirect()->back()->with('error', 'Le panier est vide.');
    }

    // Get the client information from the request
    $clientName = $request->input('full_name');
    $clientPhone = $request->input('phone_number');
    $clientSecondPhone = $request->input('second_phone_number');
    $clientAddress = $request->input('address') . ', ' . $request->input('city');
    $clientEmail = $request->input('email');

    // Save each product in the cart as a separate order and capture the last order
    $lastOrder = null;

    foreach ($panier as $item) {
        $lastOrder = commande::create([
            'nom_de_produit' => $item['name'],
            'nom_de_client' => $clientName,
            'numero_de_client' => $clientPhone,
            'adresse' => $clientAddress,
            'prix' => $item['prix'],
            'date' => now(),
        ]);
    }

    // Clear the cart after processing the checkout
    Session::forget('productItems');

    // Redirect to the order confirmation page with the last created order ID
    return redirect()->route('order-confirmation', ['orderId' => $lastOrder->id])->with('message', 'Commande validée avec succès.');
}


//commandes :
public function showCommandes()
{
    // Fetch all commandes from the database
    $commandes = commande::all();

    // Pass the data to the view
    return view('commande', compact('commandes'));
}
public function destroy($id)
    {
        $commandes = commande::findOrFail($id);
        $commandes->delete();

        return redirect()->back()->with('success', 'Commande supprimée avec succès.');
    }


    //wishlist : 
    public function wishlist()
    {
        $wishlistItems = Session::get('wishlistItems', []);
        return view('wishlist', compact('wishlistItems'));
    }

    public function add(Request $request, $productId)
    {
        $product = produits::find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Produit non trouvé.');
        }

        $wishlist = Session::get('wishlistItems', []);
        $wishlist[$productId] = $product;
        Session::put('wishlistItems', $wishlist);

        return redirect()->back()->with('message', 'Produit ajouté à la liste de souhaits.');
    }

    public function remove($productId)
    {
        $wishlist = Session::get('wishlistItems', []);
        if (isset($wishlist[$productId])) {
            unset($wishlist[$productId]);
            Session::put('wishlistItems', $wishlist);
        }

        return redirect()->back()->with('message', 'Produit retiré de la liste de souhaits.');
    } 
    
    


    




    public function confirmOrder($id)
    {
        // Retrieve the commandes by the given id
        $commandes = Commande::where('id', $id)->get();
    
        // Calculate total price, subtotal, etc. if needed
        return view('order-confirmation', compact('commandes'));
    }
    

 

}