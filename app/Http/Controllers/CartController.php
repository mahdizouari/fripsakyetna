<?php

// CartController.php

namespace App\Http\Controllers;

use App\Models\produits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\commande;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon; // Ensure Carbon is imported for date handling




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

        return response()->json([
            'success' => true,
            'cart' => $panier // ✅ Debug: return the cart directly
        ]);   
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
    $panier = Session::get('productItems', []);
    if (empty($panier)) {
        if ($request->ajax()) {
            return response()->json(['error' => 'Panier vide'], 400);
        } else {
            return redirect()->back()->with('error', 'Le panier est vide.');
        }
    }

    $request->validate([
        'full_name' => 'required|string',
        'phone_number' => 'required|string',
        'address' => 'required|string',
        'city' => 'required|string',
        'email' => 'nullable|email',
    ]);

    $clientAddress = $request->input('address') . ', ' . $request->input('city');

    $lastOrder = null;
    foreach ($panier as $item) {
        $lastOrder = Commande::create([
            'nom_de_produit' => $item['name'],
            'nom_de_client' => $request->input('full_name'),
            'numero_de_client' => $request->input('phone_number'),
            'adresse' => $clientAddress,
            'prix' => $item['prix'],
            'date' => now(),
        ]);
    }

    Session::forget('productItems');

    if ($request->ajax()) {
        return response()->json([
            'redirect_to' => route('order-confirmation', ['orderId' => $lastOrder->id])
        ]);
    } else {
        // Redirect for normal form submission
        return redirect()->route('order-confirmation', ['orderId' => $lastOrder->id]);
    }
}



public function confirmOrder($orderId)
{
    // Clear the cart session since order is confirmed
    Session::forget('productItems');

    $lastOrder = Commande::findOrFail($orderId);

    $orderDate = Carbon::parse($lastOrder->date)->toDateString();

    $commandes = Commande::where('id', $orderId)->get();


    return view('order-confirmation', compact('commandes'));
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
    
  
   
 

}